<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface AdminContract
{
    /**
     * 管理者を全て取得する
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchAdmins(array $params): LengthAwarePaginator;
}
