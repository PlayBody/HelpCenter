@extends('layouts.front')

@section('content')
    <section class="home section hero">
        <div class="container d-flex h-100">
            <div class="col-12 align-items-center">
                <div class="hero-inner">
                    <h1>Welcome to the MADE Help Centre</h1>

                    <div class="search-wrapper">
                        <div role="search" class="search search-full" >
                            <input type="search" name="query" id="query" placeholder="How can we help you?" aria-label="Search">
                        </div>

                        <div id="js-search-results" class="search-results">

                        </div>
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- end .hero -->

    <div class="home">
        <div class="container homepage-menu accordion">
            <div class="row">
                @for($kk=0; $kk<=1;$kk++)
                <div class="col-12 col-sm-6">
                    @for($i=$kk; $i<count($questions);$i=$i+2)
                    <div class="homepage-card with-border ">
                        <div class="section-header">
                            <a href="{{ url('category') }}/{{ $questions[$i]->category->id }}" class="d-flex">
                                <div class="ico">
                                    <img src="{{ asset('/uploadedimages') }}/{{ $questions[$i]->category->icon_url }}" />
                                </div>
                                <div class="title">{{ $questions[$i]->category->title }}</div>
                                <span class="see-all ml-auto">See all</span>
                            </a>
                        </div>
                        <div class="section-article">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ url('question') }}/{{ $questions[$i]->id }}" class="btn btn-link">
                                        <span class="article-title">{{ $questions[$i]->title }}</span>
                                        <div class="article-excerpt">
                                            <div class="article-excerpt-body">
                                                {!! Str::limit($questions[$i]->description, 255, $end='.......') !!}

                                                <span class="article-excerpt-more"> view more</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                @endfor

            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>
        $(function() {
            $('#query').keyup(function(e){

                if (e.keyCode==13){
                    location.href="{{ url('search/results') }}/"+$(this).val();
                    return;
                }
                var search = $(this).val();
                if (search==''){
                    $('#js-search-results').html(' <h3 style="text-align: center">No results!</h3>');
                    $('#js-search-results').show();
                    return;
                }
                $.ajax({
                    url: "{{ url('/search/query') }}",
                    method : "POST",
                    data : {'search_word' : $(this).val(), _token: '{{csrf_token()}}'},
                    success:function(response) {
                        $('#js-search-results').html(response);
                        $('#js-search-results').show();
                    },
                    error:function(){
                        alert("error");
                    }
                });
            });
            $('body').click(function(){
                 $('#js-search-results').hide();
            });
            $("#search-wrapper").focusout(function(){
                // $('#js-search-results').hide();
            });
        });

    </script>
@endsection
