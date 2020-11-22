
@extends('Admin.layouts.admin')
@section('title')
    <title>Cập nhật banner</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Banner','key'=>'Cập nhật banner'])
        <form action="{{route('banner.update')}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tiêu đề</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Nhập tiêu đề" name="title" value="{{$bannerEit->title}}">
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh :</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                            <div class="form-group">
                                <label >Is_page :</label>
                                <input type="number" class="form-control" name="is_page" min="0" value="{{$bannerEit->is_page}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control tinymce_editor" name="contents" rows="10">{{$bannerEit->content}}</textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$bannerEit->id}}">
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
