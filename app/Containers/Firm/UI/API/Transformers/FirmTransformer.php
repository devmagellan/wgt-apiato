<?php

namespace App\Containers\Firm\UI\API\Transformers;

use App\Containers\Firm\Models\Firm;
use App\Ship\Parents\Transformers\Transformer;

class FirmTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Firm $entity
     *
     * @return array
     */
    public function transform(Firm $entity)
    {
        $response = [
            'object' => 'Firm',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
