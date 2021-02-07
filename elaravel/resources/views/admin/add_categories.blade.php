@extends('admin')
@section('admin-add-categories')
<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Add edit user</div>
        <div class="panel-body">
        <form method="post" action="{{url('admin/save-category')}}">
            <!-- rows -->
            {{ csrf_field() }}
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="" name="category_name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mô tả</div>
                <div class="col-md-10">                
                    <textarea style="width:100%" name="category_description" id="" cols="30" rows="10"></textarea>
                </div>
            </div>           
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Trạng thái</div>
                <div class="col-md-10">                
                    <select name="category_status" class="form-control" style="width: 200px;">
                        <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->            
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" name="add_category_product" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection