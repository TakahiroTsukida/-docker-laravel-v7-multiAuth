@extends('layouts.app')
@section('title', Auth::guard('admin')->user()->name.' 様 ようこそ')
@section('content')
<div class="container">
    <div class="auth-form-group">
        <div class="form-card">
            <div class="body">

            </div>
        </div>
    </div>
</div>
@endsection
