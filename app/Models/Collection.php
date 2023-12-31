<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The sets belong to the collection.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sets():BelongsToMany
    {
        return $this->belongsToMany(legoSet::class,'collection_lego_set','collection_id','lego_set_id');

    }

    public function user():HasOne
    {
        return $this->hasOne(User::class,);
    }
}
