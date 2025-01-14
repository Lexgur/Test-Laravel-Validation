<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image_path', 'category_id'];

    /** Get the Category that owns the article */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /** The tags that belong to the article */

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
