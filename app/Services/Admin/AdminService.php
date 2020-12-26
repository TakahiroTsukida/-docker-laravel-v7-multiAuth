<?php

namespace App\Services\Admin;

use App\Repositories\Contracts\AdminContract;
use App\Repositories\Contracts\UserContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AdminService implements AdminServiceInterface
{
    /**
     * AdminService constructor.
     * @param AdminContract $adminContract
     */
    public function __construct(
        AdminContract $adminContract,
        UserContract $userContract

    )
    {
        $this->adminContract = $adminContract;
        $this->userContract = $userContract;
    }

    /**
     * @inheritDoc
     */
    public function searchAdmins(array $params): LengthAwarePaginator
    {
        return $this->adminContract->searchAdmins($params);
    }

    /**
     * @inheritDoc
     */
    public function searchUsers(array $params): LengthAwarePaginator
    {
        return $this->userContract->searchUsers($params);
    }
}
