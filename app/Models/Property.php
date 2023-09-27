<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'broker_id',
        'title',
        'code',
        'description',
        'price',
        'bedrooms',
        'bathrooms',
        'garages',
        'image',
        'user_id',
        'broker_id',
    ];
}
