<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class legoSet extends Model
{
    use HasFactory;

    protected $fillable = [
        'set_num',
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
    /**
     * Get the theme that owns to the set.
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(themes::class);
    }
    /**
     * Return the collections of a Lego set (Many-to-many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function collections():belongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_lego_set', 'lego_set_id','collection_id');
    }
    public function wishlists():belongsToMany
    {
        return $this->belongsToMany(Wishlist::class, 'wishlist_lego_set', 'lego_set_id','wishlist_id');
    }
}
