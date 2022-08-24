<?php

namespace App\Models\Constituencies;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Constituencies\LocalConstituency
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency query()
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string $slug
 * @property int|null $registered_voters
 * @property string $region_id
 * @property string|null $banner_url
 * @property int $published
 * @property string|null $declared_at
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereBannerUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereDeclaredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereRegisteredVoters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocalConstituency whereSlug($value)
 */
class LocalConstituency extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'slug', 'registered_voters', 'region_id', 'banner_url', 'published', 'declared_at'
    ];

    protected $dates = ['declared_at'];

    /**
     * Return this constituency's region.
     *
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
