@extends('layouts.app')

@section('title', 'Categories')

@section('content')

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Questions</h3>

                <div class="card-tools">
                    <form id="frmSearch" name="frmSearch" action="" method="POST">
                    @csrf
                  <div class="input-group" style="width: 350px;">
                      <select class="form-control float-right" name="category_id" onchange="form.submit();">
                          @foreach ($categories as $category)
                              <option @if ($category->id==$category_id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                          @endforeach
                      </select>
                    <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $search }}">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                    </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                        <th width="8%">ID</th>
                        <th width="15%">Recommend</th>
                        <th width="15%">Category</th>
                        <th width="15%">MainTitle</th>
                        <th>Description</th>
                        <th width="10%">Update Date</th>
                        <th width="10%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach ($questions as $question)
                            <tr>
                                <td>
                                    {{ $question->id }}
                                </td>
                                <td>
                                    {{ $question->rank }}
                                </td>
                                <td>
                                    {{ $question->category->title }}
                                </td>
                                <td>
                                    {{ Str::limit($question->title, 20, $end='.......') }}
                                </td>
                                <td>
                                    {{ Str::limit($question->description, 32, $end='.......') }}
                                </td>
                                <td>
                                    {{ $question->updated_at }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/questions/edit') }}/{{ $question->id }}" class="btn btn-success">edit</button></a>
                                    <a href="javascript:_delete({{ $question->id }})" class="btn btn-danger">delete</button></a>
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
<div class="row">
    <div class="col-12 ">
        <a href="{{ url('admin/questions/edit') }}" class="btn btn-info"> Add </a>
    </div>
</div>
@endsection

@section('footer_scripts')
<script type="text/javascript">
	function _delete(del_id){
        if (confirm('Do you want to Delete?')){
            location.href="{{ url('admin/questions/delete') }}/"+del_id;
        }
    }

</script>
@endsection
