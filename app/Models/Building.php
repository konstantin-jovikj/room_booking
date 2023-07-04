<?php

namespace App\Models;

use App\Models\BildingImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_name',
        'building_address',
        'building_zip',
        'building_place',
        'building_country',
    ];

    public function buildingImages()
    {
        return $this->hasMany(BildingImages::class);
    }
}
