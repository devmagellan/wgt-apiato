<?php

namespace App\Containers\User\Services;

use App\Containers\WGT\Data\Repositories\UserRepository;
use App\Containers\WGT\Services\AbstractService;

class UserService extends AbstractService
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
