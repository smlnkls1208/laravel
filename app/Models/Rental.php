<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'rented_at',
        'returned_at',
    ];

    protected $casts = [
        'rented_at' => 'datetime',
        'returned_at' => 'datetime',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
