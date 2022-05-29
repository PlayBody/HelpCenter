@extends('layouts.front')

@section('content')
<div class="article-page not-homepage">
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
                @foreach($navs as $nav)
                <li title="{{ $nav['label'] }}">
                    <a href="{{ url($nav['url']) }}">{{ $nav['label'] }}</a>
                </li>
                @endforeach
            </ol>
        </nav>
        <div class="article-container" id="article-container">
            <article class="article">
                <header class="article-header">
                    <h1 class="article-title">{{ $header['label'] }}</h1>
                </header>

                <section class="article-info">
                    <div class="article-content">
                        <div class="article-body">
                            {!! $question->description !!}
                        </div>

                        <div class="article-attachments">
                            <ul class="attachments">

                            </ul>
                        </div>
                    </div>
                </section>

                <footer>

                    <div class="article-votes d-flex align-items-center flex-column flex-sm-row">
                        <span class="article-votes-question">Was this article helpful?</span>
                        <div class="article-votes-controls ml-auto" role="radiogroup">
                            <a class="rank_add_btn button article-vote article-vote-up" data-article-id="{{ $question->id }}" aria-selected="false" role="radio" rel="nofollow" title="Yes" href="javascript:;"></a>
                            <a class=" rank_reject_btn button article-vote article-vote-down"  data-article-id="{{ $question->id }}" aria-selected="false" role="radio" rel="nofollow" title="No" href="javascript:;"></a>
                        </div>
                    </div>

                </footer>
            </article>

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

