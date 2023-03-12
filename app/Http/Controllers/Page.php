<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'parent_id',
        'title',
        'content',
        'type',
        'meta_title',
        'meta_desc',
        'type',
        'slug',
        'is_publish'
    ];

    protected $casts = [
        'is_publish' => 'boolean',
    ];

    protected function parentId(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => !empty($value) ? $value:null,
        );
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: function ($value, $attributes) {

                if($attributes['type'] === 'home') {
                    return null;
                }

                if($value === null) {
                    return Str::of($attributes['title'])->slug();
                }

                return Str::of($value)->slug();

            }
        );
    }
}
