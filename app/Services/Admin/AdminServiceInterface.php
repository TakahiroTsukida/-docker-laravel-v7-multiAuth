<?php

namespace App\Services\Admin;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface AdminServiceInterface
{
    /**
     * 管理者を全て取得する
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchAdmins(array $params): LengthAwarePaginator;

    /**
     * ユーザーを取得する
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchUsers(array $params): LengthAwarePaginator;
}
