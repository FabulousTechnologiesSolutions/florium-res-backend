<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'address',
        'details',
        'footerdet',
        'image1',
        'image2',
        'image3',
        'image4',
    ];
}
