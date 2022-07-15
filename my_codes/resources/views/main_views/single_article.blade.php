@extends('includes.html_structure')

@section('title')
{{ $article->name }}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h2 class="fw-bolder mb-1">{{ $article->name }}</h2><br>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('/images/articles_images/' . $article->image) }}" alt="{{ $article->name }}" /></figure>
                    <!-- Post content-->
                    <div>{!! $article->short_description !!}</div>
                    <hr>
                    <div>{!! $article->long_description !!}</div><br>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                            <!-- Single comment-->
                            @foreach($comments as $comment)
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" style="width: 70px; height: 70px;" src="{{ asset('/images/users_images/user.png') }}" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{ $comment->name }}</div>
                                        {{ $comment->comment }}
                                    </div>
                                </div><br>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">جستجو</div>
                    <div class="card-body">
                        <div class="input-group">
                            <form action="/search" method="GET">
                                <input class="form-control" name="search" type="text" placeholder="جستجو..." aria-label="جستجو..."
                                    aria-describedby="button-search" required />
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
                                    <li><a href="{{ route('category.articles', ['category_id' => $category->id]) }}"
                                            style="text-decoration: none;">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
