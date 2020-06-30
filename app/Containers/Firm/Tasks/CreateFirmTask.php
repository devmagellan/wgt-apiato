<?php

namespace App\Containers\Firm\Tasks;

use App\Containers\Firm\Data\Repositories\FirmRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateFirmTask extends Task
{

    protected $repository;

    public function __construct(FirmRepository $repository)
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
