<?php

namespace App\Models;

use App\Models\BildingImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;

    public function buildingImages()
    {
        return $this->hasMany(BildingImages::class);
    }
}
