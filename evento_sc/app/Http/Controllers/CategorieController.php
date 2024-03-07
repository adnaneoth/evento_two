<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategorieRequest;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories = Categorie::all();
        return view('Categorie',compact('Categories'));
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
    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|string|max:255',
        ]);

        $categorie = new Categorie();
        $categorie->name = $request->input('categorie');
        $categorie->save();

        return redirect()->route('categorie.index')->with('success', 'category add successefuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Categorie = Categorie::findOrfail($id);

        return view('Categorie',compact('Categorie'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $Categorie = Categorie::findOrfail($id);

        $Categorie->update([
            'name' => $request->name,
        ]);

        return redirect('categorie');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Categorie = Categorie::find($id);

        $Categorie->delete();
        return redirect('/categorie');
    }
}