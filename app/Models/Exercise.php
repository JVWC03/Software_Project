<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    // Define the table name if it is different from the pluralized model name
    protected $table = 'exercises';

    // Define which fields can be mass-assigned (i.e., filled via user input or forms)
    protected $fillable = [
        'name',
        'description',
        'calories_per_hour',
        'intensity'
    ];
}

