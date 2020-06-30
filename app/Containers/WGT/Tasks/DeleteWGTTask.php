<?php

namespace App\Containers\WGT\Tasks;

use App\Containers\WGT\Data\Repositories\WGTRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteWGTTask extends Task
{

    protected $repository;

    public function __construct(WGTRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
