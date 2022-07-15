@extends('includes.dashboard_html_structure')

@section('icon', asset('/images/icons/edit.png'))

@section('title')
ویرایش مقاله: {{ $article->name }}
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">ویرایش مقاله: <i>{{ $article->name }}</i></h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus me-1"></i>
                        ویرایش مقاله: <i>{{ $article->name }}</i>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('article.update', ['article' => $article->id]) }}" method="POST" enctype="multipart/form-data" style="direction: rtl;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <label for="name">نام مقاله</label>
                            <input type="text" name="name" id="name" placeholder="نام مقاله" class="form-control" value="@if(empty(old('name'))) {{ $article->name }} @else {{ old('name') }} @endif">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <label for="short_description">مقدمه</label><br><br>
                            <textarea name="short_description" class="form-control" id="short_description" rows="15" placeholder="مقدمه">
                                @if(empty(old('short_description'))) {{ $article->short_description }} @else {{ old('short_description') }} @endif
                            </textarea>
                            @if ($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span><br><br>
                            @endif
                            <br>
                            <label for="long_description">بدنه</label><br><br>
                            <textarea name="long_description" class="form-control" id="long_description" rows="15" placeholder="بدنه">
                                @if(empty(old('short_description'))) {{ $article->short_description }} @else {{ old('short_description') }} @endif
                            </textarea>
                            @if ($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span><br><br>
                            @endif
                            <br>
                            <label for="category_id">دسته بندی:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    @if($category->id == $article->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span><br><br>
                            @endif
                            <br>
                            <label for="old_image">تصویر قبلی</label><br><br>
                            <img src="{{ asset('images/articles_images/' . $article->image) }}" id="old_image" style="width: 100%; border-radius: 5px;">
                            <br><br>
                            <div class="mb-3">
                                <label for="image" class="form-label">تصویر جدید (اختیاری)</label>
                                <input class="form-control" name="image" type="file" id="image">
                            </div>
                            <br>
                            <input type="submit" value="ویرایش" class="btn btn-warning" style="color: white;">
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#short_description',
            directionality: 'rtl',
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                'wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
    <script>
        tinymce.init({
            selector: '#long_description',
            directionality: 'rtl',
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                'wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
@endsection
