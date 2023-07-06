<?php

namespace App\Models;

use App\Models\User;
use App\Models\Building;
use App\Models\RoomImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;


    protected $fillable = [
        'room_number',
        'room_description',
        'room_price',

    ];


    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'room_user', 'room_id', 'user_id')
        ->withPivot('check_in', 'check_out')->withTimestamps();
    }
}

