@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="row">
    <div class="col-12 ">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Question Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{ url('admin/questions/edit') }}" method="POST">
                <input type="hidden" name="id" value = "{{ $question->id }}" />
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id==$question->category_id) selected @endif>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Category Main Title" value="{{ $question->title }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea id="editor_description" rows="12" name="description" class="form-control">{{ $question->description }}</textarea>

                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                @csrf
                <button type="submit" class="btn btn-primary" value="save" name="action">Save</button>
                <a href="{{ url('admin/questions') }}" class="btn btn-default float-right">Back</a>
                </div>
              </form>
            </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script>

    $(function () {
        // Summernote
        $('#editor_description').summernote()

    })
</script>
@endsection
