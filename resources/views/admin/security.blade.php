@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<div class="row">
    <div class="col-12 ">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Password Change</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form id="form1" action="" method="POST">
                <div class="card-body">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                    @error('password_confirm')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirm</label>
                    <input type="password" class="form-control" name="password_confirm" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="hidden" name="action" value="save"/>
                        @csrf
                        <button type="button" class="btn btn-primary"  onclick="_update();">Save</button>
                </div>
              </form>
            </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script type="text/javascript">
        function _update(){
        if (confirm('Do you want to update?')){
            $('#form1').submit();
        }
    }

</script>
@endsection
