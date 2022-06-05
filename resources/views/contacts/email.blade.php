@extends('layouts.front')

@section('content')
<div class="request-page not-homepage">
    <section class="section hero">
        <div class="container d-flex h-100">
            <div class="col-12 align-items-center">
                <div class="hero-inner">
                    <div role="search" class="search search-full" >
                        <input type="search" name="query" id="query" placeholder="How can we help you?" aria-label="Search">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container inner-container">
        <nav class="sub-nav">
            <ol class="breadcrumbs">
                <li title="Help Centre UK">
                    <a href="{{ url('/') }}">Help Centre UK</a>
                </li>
                <li>Submit a request</li>
            </ol>
        </nav>
        
        <div class="page-header d-flex align-items-center flex-row">
                <h1>Submit a request</h1>
                <div class="cat-img ml-auto icon-contact"></div>
        </div>
        <div class="final-step form">
            <div class="subtitle">Your details</div>
            <form id="new_request" class="request-form" action="{{ url('contact/email') }}" method="post">
                
                @csrf
                <div class="form-field required ">
                    <label>Your email address</label>
                    <input type="text" name="from_email" value="{{ old('from_email') }}" />
                    @error('from_email')
                        <label class="formWarning" >{{ $message }}</label>
                    @enderror
                    
                </div>
                <div class="form-field required">
                    <label>Your full name</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}">
                    @error('full_name')
                        <label class="formWarning" >{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-field required">
                    <label id="">Comment</label>
                    <textarea name="comment">{{ old('comment') }}</textarea>
                    @error('comment')
                        <label class="formWarning" >{{ $message }}</label>
                    @enderror
                </div>
                
                <div class="form-field">
                    <label>Attachments</label>
                    <div id="upload-dropzone" class="upload-dropzone">
                    <input type="file" multiple="true" id="request-attachments" data-fileupload="true" data-dropzone="upload-dropzone" name="attachment" >
                    <span>
                        <a>Add file</a> or drop files here
                    </span>
                </div>
                <div class="progress progress-sm active mb-4" style="display:none;">
                    <div class="progress-bar bg-success progress-bar-striped" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    </div>
                </div>
                <div id="upload-error" class="notification notification-error notification-inline" style="display: none;">
                    <span data-upload-error-message=""></span>
                </div>
                <ul id="attach_list" class="upload-pool" data-template="upload-template">
                </ul>

                <footer>
                    <input type="submit" name="commit" value="Submit" class="submitButton" style="width:120px;line-height:22px;">
                </footer>

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

        $('#request-attachments').fileupload({
            url: "{{ url('contact/attachupload') }}",
            type: "post",
            sequentialUploads: true,
            dataType: 'json',
            done: function(e, data) {
                console.log(data.result.file_name);
                if(data.result){
                    var fhtml = "<li class='upload-item' aria-busy='false'>" + 
                        "<a class='upload-link' target='_blank' href='#'>"+data.result.file_name+"</a>"+
                        "<span class='upload-remove'></span>" +
                        "<input type='hidden' name='attachments[]' value='"+data.result.file_name+"'>"+
                    "</li>";
                    $(fhtml).appendTo($('#attach_list'));
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
