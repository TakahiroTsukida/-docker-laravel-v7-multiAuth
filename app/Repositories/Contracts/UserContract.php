<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface UserContract
{
    /**
     * ユーザー情報を取得する
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function searchUsers(array $params): LengthAwarePaginator;
}
