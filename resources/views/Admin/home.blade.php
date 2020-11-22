
@extends('Admin.layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Quản trị','key'=>'Home'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    Trang chủ
                </div>
            </div>
        </div>
    </div>
@endsection
