<?php

namespace App\Containers\WGT\Tasks;

use App\Containers\WGT\Data\Repositories\WGTRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllWGTSTask extends Task
{

    protected $repository;

    public function __construct(WGTRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
