<?php

namespace App\Models;

//use App\Enums\InputType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Setting extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'group_id',
        'name',
        'slug',
        'value',
        'type'
    ];

    // TODO: Make Enum InputType
    /*protected $casts = [
        'type' => InputType::class
    ];*/

    protected function groupId(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => !empty($value) ? $value:null,
        );
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: function () {
                dd($this->attributes['name']);
                return Str::of($this->attributes['name'])->slug('_');
            },
        );
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(GroupSetting::class);
    }
}
