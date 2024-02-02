<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'age', 'country', 'genre_id'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

}
