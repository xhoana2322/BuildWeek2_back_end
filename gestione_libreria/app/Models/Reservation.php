<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function book(): HasMany {
        return $this->hasMany(Book::class);
    }

    public function user(): BelongsTo {
        return $this->BelongsTo(User::class);
    }

    protected $fillable = ['status', 'user_id', 'book_id'];
}
