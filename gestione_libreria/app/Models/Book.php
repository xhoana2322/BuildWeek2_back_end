<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'author',
        'categories',
        'plot',
        'status'
    ];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reservation(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
