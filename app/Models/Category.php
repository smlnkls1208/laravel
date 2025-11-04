<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

class Category extends Model
{
    use HasFactory;

    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
//    public mixed $getPost;
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

        public function latestPost(): HasOne
    {
        return $this->hasOne(Post::class)->latestOfMany();
    }

    public function latestActivePost(): HasOne
    {
        return $this->hasOne(Post::class)->OfMany([
            'id' => 'max'
        ], function (Builder $query) {
            $query
                ->where('status', '=', 1);
                ->where('id', '<>', 3);

        });
    }

    public function oldestPost(): HasOne
    {
        return $this->hasOne(Post::class)->oldestOfMany();
    }

}
