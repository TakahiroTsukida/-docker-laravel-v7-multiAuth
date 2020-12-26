<?php

namespace App\Repositories\Eloquents;

use App\Models\Frontend\User;
use App\Repositories\Contracts\UserContract;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;

class EloquentUserRepository implements UserContract
{
    private const SEARCH_GENDER = [
        '1' => User::MALE,
        '2' => User::FEMALE,
    ];

    private const SEARCH_SORT = [
        '1' => [
            'column' => 'created_at',
            'sort'   => 'asc',
        ],
        '2' => [
            'column' => 'created_at',
            'sort'   => 'desc',
        ],
        '3' => [
            'column' => 'birthday',
            'sort'   => 'desc',
        ],
        '4' => [
            'column' => 'birthday',
            'sort'   => 'asc',
        ],
    ];

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public function searchUsers(array $params): LengthAwarePaginator
    {
        $query = User::query();

        // 名前で検索
        if (isset($params['name'])) {
            $query->where(function ($query) use ($params) {
                $query->where('name_first', 'like', "%{$params['name']}%")
                    ->orWhere('name_second', 'like', "%{$params['name']}%")
                    ->orWhere('kana_first', 'like', "%{$params['name']}%")
                    ->orWhere('kana_second', 'like', "%{$params['name']}%");
            });
        }

        // 性別で検索
        if (isset($params['gender']) && array_key_exists($params['gender'], self::SEARCH_GENDER)) {
            $query->where('gender', self::SEARCH_GENDER[$params['gender']]);
        }

        // 入会月で検索
        if (isset($params['join'])) {
            $query->where('created_at', '>=', $params['join']);
        }

        // 並び替え
        if (isset($params['sort']) && array_key_exists($params['sort'], self::SEARCH_SORT)) {
            $query->orderBy(self::SEARCH_SORT[$params['sort']]['column'], self::SEARCH_SORT[$params['sort']]['sort']);
        }

        return $query->paginate(50);
    }
}
