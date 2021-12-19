<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $country
 * @property bool $is_enable
 * @property string $icon_url
 * @property int $id
 */
class School extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'icon_url',
        'is_enable',

    ];

    /**
     * @return HasOne
     */
    public function coordinator(): HasOne
    {
        return $this->hasOne(Coordinator::class);
    }
}

