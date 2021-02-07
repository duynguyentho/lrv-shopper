@extends('admin')
@section('admin-brands')
    <div>
        <div class="col-md-12">
            <div style="margin-bottom:5px;">
                <a href="{{ URL::to('/admin/add-brand') }}" class="btn btn-primary">Add product</a>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">List product</div>
                <div class="panel-body">
                    <div class="row w3-res-tb">
                        <div class="col-sm-5 m-b-xs">
                        <form action="{{route('fill-brand')}}" method="get">
                            <select class="input-sm form-control w-sm inline v-middle" name="fill">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                            <button class="btn btn-sm btn-default">Lọc</button></form>
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                            <form action="{{route('search-brand')}}" method="GET" style="display: flex">
                                    <input type="text" name="search" class="input-sm form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <input class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></input>
                                </form>
                                </span>
                            </div>
                        </div>
                    </div>
                   
                    <a style="margin-bottom: 15px;margin-left:15px;" class="btn btn-success" href="{{route('export-brand')}}">Export</a>
                    <a style="margin-bottom: 15px;margin-left:15px;" class="btn btn-info" href="{{route('export-brand')}}">Import</a>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Name</th>
                            <th style="width: 70px;">Status</th>
                            <th style="width:100px;"></th>
                        </tr>
                        @foreach ($brands as $rows)
                            <tr>
                                <td>{{ $rows->brand_name }}</td>
                                <th style="text-align: center;">
                                    @if ($rows->brand_status == 1)
                                        <a class="fa fa-check" href=""></a>
                                    @endif
                                </th>
                                <td style="text-align:center;width:200px;">
                                    <a class="btn btn-info"
                                        href="{{ url('admin/edit-brand/' . $rows->brand_id) }}">Edit</a>&nbsp;
                                    <a class="btn btn-danger"
                                        href="{{ url('admin/delete-brand/' . $rows->brand_id) }}"
                                        onclick="return window.confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{$brands->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
