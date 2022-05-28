@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    
<div class="row">
    <div class="col-12 ">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{ url('admin/categories/edit') }}" method="POST">
                <input type="hidden" name="id" value = "{{ $category->id }}" />
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Icon</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="icon" class="custom-file-input" id="iconInputFile" >
                                <label class="custom-file-label" for="iconInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="progress progress-sm active mb-4" style="display:none;">
                        <div class="progress-bar bg-success progress-bar-striped" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                    </div>
                    <div class="mb-4">
                        <img id="icon_prev" src="{{ asset('uploadedimages') }}/{{ $category->icon_url }}" width="160"/>
                        <input type="hidden" id="hid_icon_url" name="icon_url" value="{{ $category->icon_url }}"/>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Category Main Title" value="{{ $category->title }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" placeholder="Category Sub Title" value="{{ $category->sub_title }}">
                    @error('sub_title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control">{{ $category->description }}</textarea>
                    
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                @csrf
                <button type="submit" class="btn btn-primary" value="save" name="action">Save</button>
                <a href="{{ url('admin/categories') }}" class="btn btn-default float-right">Back</a>
                </div>
              </form>
            </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script src="{{ asset('js/fileupload/jquery.fileupload.js') }}"></script>
<script src="{{ asset('js/fileupload/jquery.fileupload-process.js') }}"></script>
<script src="{{ asset('js/fileupload/jquery.fileupload-validate.js') }}"></script>

<script>

$(function() {

        $('#iconInputFile').fileupload({
            url: "{{ url('admin/categories/iconupload') }}",
            type: "post",
            sequentialUploads: true,
            dataType: 'json',
            done: function(e, data) {
                $('.progress').hide();
                if(data.result){
                    path = data.result.file_name;
                    $('#icon_prev').attr('src', "{{ asset('uploadedimages') }}/"+path);
                    $('#hid_icon_url').val(path);

                }
            },
            fail: function(e, data) {
                console.log(e);
                alert("Upload Fail");

                $('#attach_file_name').text('file Empty');
                $('#contact_attachment_file_name').val('');
                $('#contact_attachment_file_path').val('');
            },
            always: function(e, data) {
                $('.progress').hide();
                $('.progress .progress-bar').width('0%');
            },
            start: function(e, data) {
                $('.progress').show();
            },
            progressall: function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                
                console.log(progress);
                $('.progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            },
            processalways: function(e, data) {
                if (data.files.error) {
                    alert("upload error");
                }
            }
        });

    });

</script>
@endsection