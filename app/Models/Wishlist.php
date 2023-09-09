<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'public',
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
        return $this->belongsToMany(legoSet::class,'wishlist_lego_set','wishlist_id','lego_set_id');

    }




}
