<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $count = 1;

        while (Technology::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
