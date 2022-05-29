@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <div class="row mb-2">
        <div class="col-12 ">
            <a href="{{ url('admin/categories/edit') }}" class="btn btn-info"> <i class="fa fa-plus"></i> Add Category</a>
        </div>
    </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                        <th width="8%">ID</th>
                        <th width="15%">Icon</th>
                        <th >Title</th>
                        <th width="15%">order_num</th>
                        <th width="10%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach ($categories as $category)
                            <tr>
                                <td>
                                {{ $category->id }}
                                </td>
                                <td>
                                    @if ($category->icon_url==null)
                                        <img src="{{ asset('uploadedimages') }}/no-image.svg" width="90"/>
                                    @else
                                        <img src="{{ asset('uploadedimages') }}/{{ $category->icon_url }}" width="90"/>
                                    @endif
                                </td>
                                <td>
                                    {{ $category->title }}
                                </td>
                                <td>
                                    {{ $category->order_num }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/categories/edit') }}/{{ $category->id }}" class="btn btn-success">edit</button></a>
                                    <a href="javascript:_delete({{ $category->id }})" class="btn btn-danger">delete</button></a>
                                </td>
                            </tr>
                        @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
@endsection

@section('footer_scripts')
<script type="text/javascript">
	function _delete(del_id){
        if (confirm('Do you want to Delete?')){
            location.href="{{ url('admin/categories/delete') }}/"+del_id;
        }
    }

</script>
@endsection
