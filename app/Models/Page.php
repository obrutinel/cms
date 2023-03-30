<?php

namespace App\Models;

use Carbon\Carbon;
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
        'image',
        'excerpt',
        'content',
        'link_label',
        'link_url',
        'type',
        'meta_title',
        'meta_desc',
        'type',
        'slug',
        'is_publish',
        'published_at'
    ];

    protected $casts = [
        'is_publish' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: function ($value, $attributes) {

                if($attributes['type'] === 'home') {
                    return null;
                }

                if($value === null) {
                    return Str::slug($attributes['title']);
                }

                return Str::slug($value);

            }
        );
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => !empty($value)?Carbon::parse($value)->format('d/m/Y'):null,
            set: fn ($value) => !empty($value)?Carbon::createFromFormat('d/m/Y' ,$value):null,
        );
    }
}
