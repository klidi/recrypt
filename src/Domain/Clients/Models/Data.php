<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Domain\Clients\Casts\DataIdCast;
use Domain\Clients\Casts\EncryptedValueCast;
use Domain\Clients\Collections\DataCollection;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    /** @var string */
    protected $table = 'client_data';

    /** @var string */
    protected $keyType = 'string';

    /** @var bool */
    public $incrementing = false;

    /** @var array */
    protected $fillable = [
        'id',
        'value',
    ];

    protected $casts = [
        'id' => DataIdCast::class,
        'value' => EncryptedValueCast::class,
    ];

    /** @var boolean */
    public $timestamps = false;

    public function scopeFindFromWildcard($query, string $id)
    {
        return $query->where('id', 'LIKE', "{$id}%");
    }

    /**
     * this is here cuz i want to return collection in both cases. If i use something like find it returns a model
     */
    public function scopeById($query, string $id)
    {
        return $query->where('id', $id);
    }

    public function newCollection(array $models = []) : DataCollection
    {
        return new DataCollection($models);
    }
}
