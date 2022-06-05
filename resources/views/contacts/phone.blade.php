@extends('layouts.front')

@section('content')
<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

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
                <li>Request a callback</li>
            </ol>
        </nav>
        
        <div class="page-header d-flex align-items-center flex-row">
                <h1>Request a callback</h1>
                <div class="cat-img ml-auto icon-phone"></div>
        </div>
        <div class="final-step form">
            <div class="subtitle">Your details</div>
            <form id="new_request" class="request-form" action="{{ url('contact/phone') }}" method="post">
                
                @csrf
                <div class="form-field required ">
                    <label>Your email address</label>
                    <input type="text" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <label class="formWarning" >{{ $message }}</label>
                    @enderror
                </div>
                <div class="form-field required">
                    <label>Your phone number</label>
                    <input id="phone" type="tel" name="phone" value=""/>
                    <input id="phonenumber" type="hidden" name="phonenumber"/>
                    @error('phone')
                        <label class="formWarning" >{{ $message }}</label>
                    @enderror
                </div>
                
                <footer>
                    <input type="button" name="commit" value="Request Callback" class="submitButton" style="width:120px;line-height:22px;" onclick="send()";>
                </footer>

            </form>
        </div>
    </div>
</div>


@endsection


@section('footer_scripts')
<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });

   function send(){
        $('#phonenumber').val(phoneInput.getNumber());
        $('form').submit();
   }
    
 </script>
@endsection
