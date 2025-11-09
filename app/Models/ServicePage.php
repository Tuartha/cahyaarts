<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function getAllServices()
    {
        return Service::where('is_active', true)->get();
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
