<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termini extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'text',
        'name',
        'lname',
        'email',
        'phone',
    ];
}
