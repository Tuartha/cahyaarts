<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'umur',
        'notelp',
    ];
}
