<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'slug', 'body', 'image', 'category_id', 'type_id'];

    public static function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $count = 1;

        while (Project::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }

    /**
     * Get the user that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function categories()
    {
        return $this->belongsTO(Category::class);
    }

    public function types()
    {
        return $this->belongsTO(Type::class);
    }
}
