@extends('includes.html_structure')

@section('title')
مقالات دسته بندی: {{ $category->category_name }}
@endsection

@section('content')
    <div class="card mb-4" style="padding-right: 5px;">
        <div class="card-header">دسته بندی ها</div>
        <div class="card-body">
            <div class="row">
                <ul class="list-unstyled mb-0">
                    @foreach ($all_categories as $category)
                        <li><a href="{{ route('category.articles', ['category_id' => $category->id]) }}"
                                style="text-decoration: none;">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

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
