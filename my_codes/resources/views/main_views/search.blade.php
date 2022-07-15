@extends('includes.html_structure')

@section('title')
جستجو برای: {{ $searched_word }}
@endsection

@section('content')
    <form action="/search" method="GET">
        <input style="width: 500px; height: 30px; margin-right: 5px;" name="search" value="{{ $searched_word }}" type="text" placeholder="جستجو..." aria-label="جستجو..."
            aria-describedby="button-search" required />
        <input type="submit" value="جستجو" class="btn btn-primary">
    </form><br><br>
    <table class="table table-bordered table-striped table-hover">
        @foreach ($articles as $article)
            <tr>
                <td>
                    <a href="{{ route('single.article', ['article_id' => $article->id]) }}">{{ $article->name }}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
