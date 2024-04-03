<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'location',
        'link',
        'phone',
        'type',
        'price',
        'avaibility',
        'details',
        'about',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
