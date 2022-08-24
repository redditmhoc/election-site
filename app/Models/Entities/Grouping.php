<?php

namespace App\Models\Entities;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entities\Grouping
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $logo_url
 * @property string $colour_hex
 * @property int $defunct
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereColourHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereDefunct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grouping whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Grouping extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'code', 'logo_url', 'colour_hex', 'defunct'
    ];
}
