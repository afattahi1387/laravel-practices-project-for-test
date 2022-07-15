@extends('includes.html_structure')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if (empty($articles))
                    error
                @else
                    @foreach ($articles as $article)
                        <div class="card mb-4">
                            <a href="{{ route('single.article', ['article_id' => $article->id]) }}"><img class="card-img-top" src="/images/articles_images/{{ $article->image }}"
                                    alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title h4">{{ $article->name }}</h2>
                                <p class="card-text">{!! $article->short_description !!}</p>
                                <a class="btn btn-primary" href="{{ route('single.article', ['article_id' => $article->id]) }}">مشاهده مقاله →</a>
                            </div>
                        </div>
                    @endforeach
                @endif

                {{ $articles->links() }}

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">جستجو</div>
                    <div class="card-body">
                        <div class="input-group">
                            <form action="/search" method="GET">
                                <input class="form-control" name="search" type="text" placeholder="جستجو..."
                                    aria-label="جستجو..." aria-describedby="button-search" required />
                                <br><br><input type="submit" value="جستجو" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4" style="padding-right: 5px;">
                    <div class="card-header">دسته بندی ها</div>
                    <div class="card-body">
                        <div class="row">
                            <ul class="list-unstyled mb-0">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category.articles', ['category_id' => $category->id]) }}" style="text-decoration: none;">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
