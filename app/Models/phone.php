<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'NameApp',
        'Name',
        'Ville',
        'Numero',
        'email',
        'Type'
    ];
}
