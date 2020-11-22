
@extends('Admin.layouts.admin')
@section('title')
    <title>Cập nhật danh mục</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Partner','key'=>'Cập nhật đối tác'])
        <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tên danh mục</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tên danh mục" name="name" value="{{$categoryEit->name}}">
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh :</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{$categoryEit->id}}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection
