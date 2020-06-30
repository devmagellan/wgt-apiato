<?php

namespace App\Containers\WGT\Tasks;

use App\Containers\WGT\Data\Repositories\WGTRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateWGTTask extends Task
{

    protected $repository;

    public function __construct(WGTRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
