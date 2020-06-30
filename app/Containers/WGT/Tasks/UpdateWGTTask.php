<?php

namespace App\Containers\WGT\Tasks;

use App\Containers\WGT\Data\Repositories\WGTRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateWGTTask extends Task
{

    protected $repository;

    public function __construct(WGTRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
