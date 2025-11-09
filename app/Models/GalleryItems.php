<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'is_active',
    ];

    public function galleryPage()
    {
        return $this->belongsTo(GalleryPage::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
