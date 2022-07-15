@extends('includes.dashboard_html_structure')

@section('icon', asset('/images/icons/add.jpg'))

@section('title')
افزودن تصویر به مقاله: {{ $article->name }}
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">افزودن تصویر به مقاله: <i>{{ $article->name }}</i></h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus me-1"></i>
                        افزودن تصویر به مقاله: <i>{{ $article->name }}</i>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('image.upload', ['article_id' => $article->id]) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="image" class="form-label">لطفا تصویر خود را با استفاده از کادر زیر آپلود کنید.</label>
                                <input class="form-control" name="image" type="file" id="image">
                                @if($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span><br>
                                @endif
                                <br>
                                <input type="submit" value="تایید" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
