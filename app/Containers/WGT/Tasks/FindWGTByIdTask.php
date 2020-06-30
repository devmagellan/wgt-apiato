<?php

namespace App\Containers\WGT\Tasks;

use App\Containers\WGT\Data\Repositories\WGTRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindWGTByIdTask extends Task
{

    protected $repository;

    public function __construct(WGTRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
