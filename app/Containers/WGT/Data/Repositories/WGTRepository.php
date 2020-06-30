<?php

namespace App\Containers\WGT\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class WGTRepository
 */
class WGTRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
