<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'author', 'categories', 'plot', 'status'
    ];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function category(): BelongsTo

    {
        return $this->belongsTo(Category::class);
    }

}
