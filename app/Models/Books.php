<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'image_path',
        'author_id'
    ];

    public  function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function getImageUrlAttribute()
    {
        return asset('public' . Storage::url($this->image_path));
    }
}
