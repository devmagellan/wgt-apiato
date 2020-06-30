<?php

namespace App\Containers\Firm\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Containers\Firm\Models\Firm\FirmAddress;
use App\Containers\Firm\Models\Firm\FirmExtra;

class Firm extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'website',
        'discount',
        'type',
        'supplier',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'website' => 'string',
        'discount' => 'decimal:2',
        'type' => 'string',
        'supplier' => 'string',
        'status' => 'string',
    ];

    /**
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(FirmAddress::class);
    }

    /**
     * @return HasOne
     */
    public function extra(): HasOne
    {
        return $this->hasOne(FirmExtra::class);
    }

    /**
     * @return BelongsToMany
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->as('work')->withPivot(['id', 'position']);
    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'firms';
}
