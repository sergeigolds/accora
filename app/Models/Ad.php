<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'image_src'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isExpired()
    {
        return $this->created_at->addMonths(3)->isPast();
    }

    public function scopeActive($query)
    {
        return $query->whereDate('created_at', '>', now()->subMonths(3));
    }
}
