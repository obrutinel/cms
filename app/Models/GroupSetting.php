<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GroupSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'position'
    ];

    public function settings(): HasMany
    {
        return $this->hasMany(Setting::class, 'group_id');
    }
}
