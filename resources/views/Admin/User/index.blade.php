
@extends('Admin.layouts.admin')
@section('title')
    <title>List user</title>
@endsection
@section('css')
    <link href="{{asset('admins/product/list/list.css')}}" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{asset('vendors/sweetalert/sweetalert2@10.js')}}"></script>
    <script src="{{asset('admins/product/list/list.js')}}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'User','key'=>'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('user.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allUsers as $allUser)
                                <tr>
                                    <th scope="row">{{$allUser->id}}</th>
                                    <td>{{$allUser->name}}</td>
                                    <td>{{$allUser->email}}</td>
                                    <td>
                                        <a href="{{route('user.edit',['id'=>$allUser->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('user.delete',['id'=>$allUser->id] )}}" class="btn btn-danger confirm_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $allUsers->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
