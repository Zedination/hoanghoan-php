
@extends('Admin.layouts.admin')
@section('title')
    <title>Cập nhật sản phẩm</title>
@endsection
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/product/edit/edit.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">
        @include('Admin.partials.content-header',['name'=>'Product','key'=>'Cập nhật sản phẩm'])
        <form action="{{route('product.update')}}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label >Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name" value="{{$productEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label >Giá sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price" value="{{$productEdit->price}}">
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh profile:</label>
                                <input type="file" class="form-control-container_image_featurefile" name="image" id="image_profile">
                                <div class="col-md-12" id="container_image_featurefile">
                                    <div class="row">
                                        <img src="{{$productEdit->image}}" class="product_image_150_100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label >Chọn ảnh chi tiết:</label>
                                <input type="file" class="form-control-file" name="image_path[]" multiple id="image_detail">
                            </div>
                            <div class="col-md-12 container_image_detail">
                                <div class="row">
                                    @foreach($productEdit->getProductImage as $productImageItem)
                                        <div class="col-md-3">
                                            <img src="{{$productImageItem->image}}" alt="" class="product_image_150_100">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach($categories as $category)
                                        <option {{$productEdit->category_id == $category->id ? 'selected' :'' }} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Chọn chất liệu</label>
                                <select class="form-control tags_select2_choose" multiple="multiple" name="materials[]">
                                    @foreach($productEdit->getMaterial as $value)
                                        <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                    @endforeach
                                    @foreach($materials as $material)
                                            <option value="{{$material->id}}">{{$material->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control tinymce_editor" name="contents" rows="10">{{$productEdit->content}}</textarea>
                            </div>
                            <input type="hidden" value="{{$productEdit->id}}" name="productId">
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
    <script src="{{asset('admins/product/edit/edit.js')}}"></script>
@endsection
