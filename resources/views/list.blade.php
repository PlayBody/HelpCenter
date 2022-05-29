@extends('layouts.front')

@section('content')
<div class="category-page not-homepage">
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
    <div class="content container">
        <nav class="sub-nav">
            <ol class="breadcrumbs">
                <li title="Help Centre UK">
                    <a href="{{ url('/') }}">Help Centre UK</a>
                </li>
                @foreach($navs as $nav)
                <li title="{{ $nav['label'] }}">
                    <a href="{{ url($nav['url']) }}">{{ $nav['label'] }}</a>
                </li>
                @endforeach
            </ol>
        </nav>
        <header class="page-header d-flex align-items-center flex-row">
            <h1>{{ $header['label'] }}</h1>
            @if($header['icon'] != '')
            <div class="cat-img ml-auto">
                <img src="{{ asset('/uploadedimages') }}/{{ $header['icon'] }}" />
            </div>
            @endif
        </header>
        <div class="section-tree">
            <div class="accordion" id="accordion-articles">
                @foreach($questions as $question)
                <div class="card">
                    <div class="card-header" id="article-heading-{{ $question->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#article-collapse-{{ $question->id }}" aria-expanded="false" aria-controls="article-collapse-4404703737362">
                                <span class="article-title">{{ $question->title }}</span>
                                <div class="article-excerpt">
                                    <div class="article-excerpt-body">
                                        {!! Str::limit($question->description, 150, $end='.......') !!}
                                        <span class="article-excerpt-more">view more</span>
                                    </div>
                                </div>
                            </button>
                        </h5>
                    </div><!-- .card-header -->
                    <div id="article-collapse-{{ $question->id }}" class="collapse" aria-labelledby="article-heading-{{ $question->id }}" data-parent="#accordion-articles">
                        <div class="card-body">
                            {!! $question->description !!}
                            <div class="article-item-vote">
                                <span>Was this article helpful ?</span>
                                <div class="vote-buttons">
                                    <a href="javascript:;"  data-article-id="{{ $question->id }}" class="rank_add_btn js-vote-button vote-button-yes">Yes</a>
                                    <a href="javascript:;"  data-article-id="{{ $question->id }}" class="rank_reject_btn js-vote-button vote-button-no">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- accordion-body -->
                </div>
                @endforeach
            </div>
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
                }
            });
        });
    </script>
@endsection

