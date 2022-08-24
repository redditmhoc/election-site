<?php

namespace App\Models\Entities;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entities\Candidate
 *
 * @property int $id
 * @property string $name
 * @property string|null $image_url
 * @property int $incumbent
 * @property string $grouping_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereGroupingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereIncumbent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Candidate extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'image_url', 'incumbent', 'grouping_id'
    ];
}
