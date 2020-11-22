
@extends('Admin.layouts.admin')
@section('title')
    <title>Cập nhật user</title>
@endsection
@section('css')
    <link href="{{asset('admins/product/edit/edit.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Users','key'=>'Cập nhật user'])
        <form action="{{route('user.update')}}" method="POST">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tên user</label>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nhập tên user" name="name" value="{{$userEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label >Nhập email</label>
                                <input type="email"
                                       class="form-control"
                                       placeholder="Nhập email" name="email" value="{{$userEdit->email}}" >
                            </div>
                            <div class="form-group">
                                <label >Nhập password:</label>
                                <input type="password"
                                       class="form-control"
                                       placeholder="Nhập password" name="password" value="{{$userEdit->password}}">
                            </div>
                            <input type="hidden" value="{{$userEdit->id}}" name="id">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

