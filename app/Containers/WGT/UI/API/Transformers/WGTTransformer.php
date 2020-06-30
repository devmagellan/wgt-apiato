<?php

namespace App\Containers\WGT\UI\API\Transformers;

use App\Containers\WGT\Models\WGT;
use App\Ship\Parents\Transformers\Transformer;

class WGTTransformer extends Transformer
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
     * @param WGT $entity
     *
     * @return array
     */
    public function transform(WGT $entity)
    {
        $response = [
            'object' => 'WGT',
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
