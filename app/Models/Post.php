<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\HigherOrderCollectionProxy;

/**
 * @property int status
 */

class Post extends Model
{
    use HasFactory;

    /**
     * @var HigherOrderCollectionProxy|mixed
     */
//    public mixed $category;
//    protected $fillable = ['title', 'content', 'category_id'];

//    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
//        return $this->belongsToMany(Tag::class)->withPivot(['created_at']);
        return $this->belongsToMany(Tag::class)->as('ts')->withTimestamps();

    }

    public function isPublished()
    {
        return $this->status ? 'Published' : 'Not Published';
    }

}
