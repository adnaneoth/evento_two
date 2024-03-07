<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'organizer_id',
        'category_id',
        'price',
        'status',
        'autoAccept',
        'nb_place',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'event_id');
    }
}
