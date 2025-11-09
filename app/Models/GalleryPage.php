<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'items_to_display',
    ];

    public function galleryItems()
    {
        return $this->hasMany(GalleryItems::class);
    }

    public function getActiveGalleryItems()
    {
        return GalleryItems::where('is_active', true)->get();
    }
}
