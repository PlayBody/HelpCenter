
        <div class="search-results-items">
            @if(count($questions)<1)
                <h3  style="text-align: center">No Results!</h3>
            @endif

            @foreach($questions as $question)
            <div class="result">
                <a href="{{ url('/question/') }}/{{ $question->id }}">
                    <div class="result-title">
                        {{ $question->title }}
                    </div>
                    <div class="result-content">
                        {{ Str::limit($question->description, 155, $end='...') }}
                    </div>
                </a>

            </div>
            @endforeach
        </div>
