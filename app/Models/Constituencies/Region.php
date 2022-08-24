<?php

namespace App\Models\Constituencies;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Constituencies\Region
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $banner_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereBannerUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Region extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'slug', 'banner_url'
    ];

    /**
     * Return this region's local constituencies.
     *
     * @return HasMany
     */
    public function localConstituencies(): HasMany
    {
        return $this->hasMany(LocalConstituency::class);
    }
}
