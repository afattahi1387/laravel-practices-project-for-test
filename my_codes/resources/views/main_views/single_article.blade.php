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
                    <div>
                        <b>تعداد رای های «عالی بود»: </b><span>{{ $great_votes }}</span><br><br>
                        <b>تعداد رای های «بد نبود»: </b><span>{{ $dont_bad_votes }}</span><br><br>
                        <b>تعداد رای های «اصلا خوب نبود»: </b><span>{{ $bad_votes }}</span>
                    </div><br>
                    <a href="{{ route('vote.add.great', ['article_id' => $article->id]) }}" class="btn btn-success">
                        عالی بود
                    </a>
                    <a href="{{ route('vote.add.dontbad', ['article_id' => $article->id]) }}" class="btn btn-warning">
                        بد نبود
                    </a>
                    <a href="{{ route('vote.add.bad', ['article_id' => $article->id]) }}" class="btn btn-danger">
                        اصلا خوب نبود
                    </a>
                    <br><br><br>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form action="{{ route('comment.add', ['article_id' => $article->id]) }}" method="POST" class="mb-4">
                                <h3>افزودن کامنت</h3>
                                {{ csrf_field() }}
                                <input type="text" name="name" placeholder="نام شما" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span><br>
                                @endif
                                <br>
                                <textarea name="comment" class="form-control" rows="5" placeholder="متن کامنت شما">{{ old('comment') }}</textarea>
                                @if($errors->has('comment'))
                                    <span class="text-danger">{{ $errors->first('comment') }}</span><br>
                                @endif
                                <br><input type="submit" value="تایید" class="btn btn-success">
                            </form><br>
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
