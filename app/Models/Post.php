<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function isPublished()
    {
        return $this->status ? 'Published' : 'Not Published';
    }

}
