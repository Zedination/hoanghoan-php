
@extends('Admin.layouts.admin')
@section('title')
    <title>List sản phẩm</title>
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
        @include('Admin.partials.content-header',['name'=>'Product','key'=>'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Thêm mới</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{$product->image}}" alt="Ảnh sản phẩm ">
                                    </td>
                                    <td>{{number_format((float)$product->price)}} VNĐ</td>
                                    <td>{{optional($product->getCategory)->name}}</td>
                                    <td>
                                        <a href="{{route('product.edit',['id'=>$product->id] )}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('product.delete',['id'=>$product->id] )}}" class="btn btn-danger confirm_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
