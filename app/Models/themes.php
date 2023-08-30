<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class themes extends Model
{
    use HasFactory;
    protected $fillable = [
        'theme_id',
        'parent_id',
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * Return the Theme of a sets (one-to-many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sets()
    {
        return $this->hasMany(legoSet::class);
    }
}
