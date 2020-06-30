<?php

namespace App\Containers\Firm\Tasks;

use App\Containers\Firm\Data\Repositories\FirmRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateFirmTask extends Task
{

    protected $repository;

    public function __construct(FirmRepository $repository)
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
