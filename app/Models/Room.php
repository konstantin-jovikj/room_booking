<?php

namespace App\Models;

use App\Models\Building;
use App\Models\RoomImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function roomImages()
    {
        return $this->hasMany(RoomImage::class);
    }
}
