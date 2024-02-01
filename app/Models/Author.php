<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'age', 'country', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id');
    }
}
