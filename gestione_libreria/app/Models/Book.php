<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author(): BelongsTo {
        return $this->BelongsTo(Author::class);
    }

    public function category(): HasMany {
        return $this->hasMany(Category::class);
    }
}
