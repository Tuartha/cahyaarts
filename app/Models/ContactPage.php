<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'button_text',
    ];

    public function contactItems()
    {
        return $this->hasMany(ContactItems::class);
    }

    public function getContactItemsAttribute()
    {
        return $this->contactItems()->get();
    }
}
