<?php

namespace App\Repositories\Eloquents;

use App\Models\Backend\Admin;
use App\Repositories\Contracts\AdminContract;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentAdminRepository implements AdminContract
{
    public function __construct(
        Admin $admin
    )
    {
        $this->admin = $admin;
    }

    public function searchAdmins(array $params): LengthAwarePaginator
    {
        return $this->admin->paginate(20);
    }
}
