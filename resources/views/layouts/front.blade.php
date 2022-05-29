<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} | Admin</title>

    <link rel="stylesheet" media="all" href="{{ asset('css/front/application-eee6d8d7fa05e7e79d4f3bfce1e548f7.css') }}" id="stylesheet">
    <link rel="stylesheet" media="all" href="{{ asset('css/front/theming_v1_support-cf937686d5b6669242017892da7bad78.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/bootstrap.min.css') }}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/handlebars.min.js') }}"></script>
    <script src="{{ asset('js/lodash.min.js') }}"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <header id="main-header" class="position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center position-inherit min-h-container">
                    <div class="logo">
                        <a href="{{ url('/') }}">MADE</a>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <main role="main">
        @yield('content')
    </main>

    <section class="section contact-us-card text-center">
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Can't find what you're looking for?<br>
                            <br></h4>
                        <a href="javascript:;" id="btn_contact" class=" request-btn js-request-btn">
                            Contact Us
                        </a>

                        <div class="contact-details d-none">
                            <div id="js-chat-item" class="contact-item" style="display: none;">
                                <a href="#" class="trigger-chat">
                                    <div class="contact-item-header">
                                        <span class="contact-icon chat-icon"></span>
                                        <h3>Live Chat</h3>
                                    </div>

                                    <p>Monday-Friday: 8am-8:30pm <br>
                                        Saturday-Sunday: 9am-5:30pm <br> <br>

                                        <i> (Average wait: 2 mins) </i>

                                    </p>
                                    <p><br></p>
                                </a>
                            </div>
                            <div id="js-chat-item" class="contact-item">
                                <a href="https://wa.me/443442571888">
                                    <div class="contact-item-header">
                                        <span class="contact-icon whatsapp-icon"></span>
                                        <h3>WhatsApp</h3>
                                    </div>

                                    <p>Monday-Friday: 8am-8:30pm<br>
                                        Saturday-Sunday: 9am-5:30pm

                                    </p>
                                </a>
                            </div>

                            <div id="js-chat-item" class="contact-item">
                                <a href="http://m.me/Madedotcom">
                                    <div class="contact-item-header">
                                        <span class="contact-icon messenger-icon"></span>
                                        <h3>Facebook Messenger</h3>
                                    </div>

                                    <p>Monday-Friday: 8am-5:30pm<br>
                                        Saturday-Sunday: 9am-5:30pm
                                    </p>
                                </a>
                            </div>

                            <div class="contact-item">
                                <a href="/hc/en-gb/requests/new">
                                    <div class="contact-item-header">
                                        <span class="contact-icon email-icon"></span>
                                        <h3>Email Us</h3>
                                    </div>

                                    <p><br></p>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
                <br><br>
                <h7>So that we can resolve your query as quickly as possible, please provide as much information as you can when submitting your request, such as photos and videos, if applicable.

                </h7></div>

        </div>
    </section>
    <footer id="down" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-5 menu d-flex justify-content-center align-items-center justify-content-sm-start">
                    <a href="#">Terms and conditions</a>
                    <a href="#">Privacy and Cookie Policy</a>
                    <a href="#">Sitemap</a>
                </div>

                <div class="col-12 col-sm-7 d-flex justify-content-center align-items-center justify-content-sm-end">
                    <span class="registered text-center text-sm-right">Registered number: 07101408 | Registered office: 5 Singer Street, London, EC2A 4BQ</span>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    $(function() {
        $('#btn_contact').click(function(){
            $(this).hide();
            $('.contact-details').removeClass('d-none');
        });

        $('.rank_add_btn').click(function(){
            $.ajax({
                url: "{{ url('/recommend') }}",
                method : "POST",
                data : {'question_id' : $(this).attr('data-article-id'), 'count':1, _token: '{{csrf_token()}}'},
                success:function(response) {
                },
                error:function(){
                }
            });

        });
        $('.rank_reject_btn').click(function(){

            scrollbottom();
            $.ajax({
                url: "{{ url('/recommend') }}",
                method : "POST",
                data : {'question_id' : $(this).attr('data-article-id'), 'count':-1, _token: '{{csrf_token()}}'},
                success:function(response) {
                },
                error:function(){
                }
            });

        });
    });
    function scrollbottom(){
        window.scrollTo(0, document.body.scrollHeight);
    }

</script>
@yield('footer_scripts')
</body>
</html>

