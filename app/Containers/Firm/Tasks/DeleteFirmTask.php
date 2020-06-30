<?php

namespace App\Containers\Firm\Tasks;

use App\Containers\Firm\Data\Repositories\FirmRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteFirmTask extends Task
{

    protected $repository;

    public function __construct(FirmRepository $repository)
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
