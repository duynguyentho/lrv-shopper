@extends('admin')
@section('admin-edit-brands')
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Update</div>
        <div class="panel-body">
        <form method="post" action="{{URL::to('admin/update-brand/'.$edit_brands->brand_id)}}">
            <!-- rows -->
            {{ csrf_field() }}
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                <input type="text" value="{{$edit_brands->brand_name}}" name="brand_name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->         
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Trạng thái</div>
                <div class="col-md-10">                
                    <select name="brand_status" class="form-control" style="width: 200px;">
                        <option value="0">Ẩn</option>
                        <option @if ($edit_brands->brand_status == 1)
                            selected
                        @endif 
                        value="1">Hiển thị</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->            
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" name="edit_brand_product" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection