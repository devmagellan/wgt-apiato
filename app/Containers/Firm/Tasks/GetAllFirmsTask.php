<?php

namespace App\Containers\Firm\Tasks;

use App\Containers\Firm\Data\Repositories\FirmRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllFirmsTask extends Task
{

    protected $repository;

    public function __construct(FirmRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
