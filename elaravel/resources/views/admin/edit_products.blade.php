@extends('admin')
@section('admin-add-products')
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit user</div>
        <div class="panel-body">
        <form method="post" action="{{url('admin/update-product/'.$products->product_id)}}" enctype="multipart/form-data">
            <!-- rows -->
            {{ csrf_field() }}
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tên sản phẩm</div>
                <div class="col-md-10">
                <input type="text" value="{{$products->product_name}}" name="product_name" class="form-control" required>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Danh mục</div>
                <div class="col-md-10">                
                    <select name="product_category" class="form-control" style="width: 200px;">
                            @foreach ($categories as $items)
                    <option value="{{$items->category_id}}">{{$items->category_name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Thương hiệu</div>
                <div class="col-md-10">                
                    <select name="product_brand" class="form-control" style="width: 200px;">
                        @foreach ($brands as $items)
                        <option value="{{$items->brand_id}}">{{$items->brand_name}}</option>
                                @endforeach
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mô tả</div>
                <div class="col-md-10">                
                    <textarea style="width:100%" name="product_description" id="" cols="30" rows="10">
                        {{isset($products->product_description) ? $products->product_description:''}}
                    </textarea>
                </div>
            </div>          
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Nội dung</div>
                <div class="col-md-10">                
                    <textarea style="width:100%" name="product_content" id="" cols="30" rows="10">
                        {{isset($products->product_content) ? $products->product_content:''}}
                    </textarea>
                </div>
            </div>    
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Hot</div>
                <div class="col-md-10">                
                    <select name="product_status" class="form-control" style="width: 200px;">
                        <option @if ($products->product_status == 1)
                            selected
                        @endif value="0">Ẩn</option>
                        <option @if ($products->product_status == 1)
                            selected
                        @endif value="1">Hiển thị</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Đơn giá</div>
                <div class="col-md-10">
                <input type="text" value="{{$products->product_price}}" name="product_price" class="form-control" required>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Giảm giá</div>
                <div class="col-md-10">
                    <input type="text" value="{{$products->product_discount}}" name="product_discount" class="form-control" required>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Images</div>
                <div class="col-md-10">
                    <input type="file" value="" name="product_image" class="form-control">
                </div>
            </div>
            <!-- end rows -->            
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Sale</div>
                <div class="col-md-10">
                    <input type="text" value="{{$products->product_sale}}" name="product_sale" class="form-control" required>
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" name="add_product_product" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection