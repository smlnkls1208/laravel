<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public mixed $getPost;
    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
//    public mixed $posts;

    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

}
