@extends('layouts.app')

@section('title', 'ユーザー情報一覧')

@section('content')
    <div class="container">
        <div class="index-group">
            <div class="search-group">
                <form action="{{ route('backend.user.index') }}" method="get">
                    <div class="name-group">
                        <input class="name" type="text" name="name" value="{{ $name }}" placeholder="名前で検索">
                    </div>
                    <div class="gender-group">
                        <select name="gender" class="gender">
                            <option value="">性別で検索</option>
                            <option value="1" {{$gender == 1 ? "selected" : ""}}>男性のみ</option>
                            <option value="2" {{$gender == 2 ? "selected" : ""}}>女性のみ</option>
                        </select>
                    </div>
                    <div class="sort-group">
                        <select name="sort" class="sort">
                            <option value="">並び替え</option>
                            <option value="1" {{$sort == 1 ? "selected" : ""}}>入会日（昇順）</option>
                            <option value="2" {{$sort == 2 ? "selected" : ""}}>入会日（降順）</option>
                            <option value="3" {{$sort == 3 ? "selected" : ""}}>年齢（若い順）</option>
                            <option value="4" {{$sort == 4 ? "selected" : ""}}>年齢（年寄り順）</option>
                        </select>
                    </div>
                    <div class="join-group">
                        <label>入会日（以降）</label>
                        <input type="date" name="join" class="join-date" value="{{ $join }}">
                    </div>
                    <div class="search-btn-group">
                        <button type="submit" class="btn btn-primary search-btn">検索</button>
                    </div>
                </form>
            </div>

            <table class="table user-index-table">
                <thead class="thead-dark">
                <tr>
                    <th class="name">名前</th>
                    <th class="gender">性別</th>
                    <th class="age">年齢</th>
                    <th class="join">入会日</th>
                </tr>
                </thead>

                <tbody class="bg-white">
                @forelse($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('backend.user.show', ['user' => $user]) }}">
                                    {{ $user->name_first }} {{ $user->name_second }}
                                </a>
                            </td>
                            <td>{{ $user->gender === \App\Models\Frontend\User::MALE ? "男性" : "女性" }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->birthday)->age }} 歳</td>
                            <td>{{ $user->created_at->isoFormat('YYYY年MM月DD日') }}</td>
                        </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            ユーザー情報はありません
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $users->appends(request()->input())->links() }}
        </div>
    </div>

@endsection
