@extends('layouts.app')

@section('title', 'ユーザー情報一覧')

@section('content')
    <div class="container">
        <div class="card">
            <label>{{ $user->kana_first }} {{ $user->kana_second }}</label>
            <label>{{ $user->name_first }} {{ $user->name_second }}</label>
            <label>{{ $user->gender === \App\Models\Frontend\User::MALE ? "男性" : "女性" }}</label>
            <label>{{ \Carbon\Carbon::parse($user->birthday)->age }} 歳</label>
            <label>{{ $user->created_at->isoFormat('YYYY年MM月DD日') }}</label>
        </div>
    </div>

@endsection
