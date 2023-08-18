<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class legoSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'set_number',
        'name',
        'description',
        'year',
        'theme_id',
        'num_parts',
        'set_img_url',
        'size',
        'type',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
