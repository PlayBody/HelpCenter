@extends('layouts.front')

@section('content')
<div class="search-page not-homepage">
    <section class="section hero">
        <div class="container d-flex h-100">
            <div class="col-12 align-items-center">
                <div class="hero-inner">
                    <div role="search" class="search search-full" >
                        <input type="search" name="query" id="query" placeholder="How can we help you?" aria-label="Search" value="{{ $query }}">
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
                <li>
                    Search results
                </li>
            </ol>
        </nav>
        <header class="page-header d-flex align-items-center flex-row">
            <h1>Search results</h1><p class="page-header-description">{{ $questions->total()>0 ? $questions->total() : 'No' }} results for "{{ $query }}"</p>
        </header>
        <div class="search-results">
            <section class="search-results-column">
                <ul class="search-results-list">
                    @foreach($questions as $question)
                    <li class="search-result">
                        <a href="{{ url('question') }}/{{ $question->id }}">{{ $question->title }}</a>
                        @if($question->rank!=0)
                        <span class="search-result-votes meta-count">{{ $question->rank }}</span>
                        @endif
                        <div class="search-result-description">{{ Str::limit($question->description, 160, $end='') }}</div>
                    </li>
                    @endforeach
                </ul>
            </section>
        </div>
        {!! $questions->links() !!}
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
