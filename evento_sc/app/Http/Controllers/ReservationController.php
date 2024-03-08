<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {

        $reservations = $event->reservations()->with('user')->get();
        return view('reservation', compact('reservations'));

    }

    public function myreservation()
    {

        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('myreservation', compact('reservations'));

    }


    public function accept(Reservation $reservation)
    {
        $event = Event::findOrFail($reservation->event_id);
        if ($event->nb_place > 0) {
            reservation::where('id', $reservation->id)->update(['status' => 'accepted']);
            $event->nb_place -= 1;
            $event->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Places are not available for this event');
        }
    }


    public function refuse(reservation $reservation)
    {
        reservation::where('id', $reservation->id)->update(['status' => 'refused']);
        return redirect()->back();

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $id, string $autoAccept)
    {
        $type = $autoAccept;

        $userId = Auth::id();
        $eventid = $id;
        $event = Event::findOrFail($eventid);
        if ($event->nb_place > 0) {
            if ($type == 'manuel') {
                $reservation = new Reservation([
                    'status' => 'pending',
                    'user_id' => $userId,
                    'event_id' => $eventid,
                ]);
            } else {
                $reservation = new Reservation([
                    'status' => 'accepted',
                    'user_id' => $userId,
                    'event_id' => $eventid,
                ]);
                $event->nb_place -= 1;
                $event->save();
            }
            $reservation->save();
            return redirect()->route('allevents');
        } else {
            return redirect()->route('allevents')->with('error', 'Places are not available for this event');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
