@extends('includes.dashboard_html_structure')

@section('icon', asset('images/icons/add.jpg'))

@section('title', 'افزودن مقاله')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">افزودن مقاله</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus me-1"></i>
                        افزودن مقاله
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.insert') }}" method="POST" style="direction: rtl;">
                            {{ csrf_field() }}
                            <input type="text" name="name" placeholder="نام مقاله" class="form-control" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <textarea name="short_description" class="form-control" id="short_description" rows="15" placeholder="مقدمه">{{ old('short_description') }}</textarea>
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span><br><br>
                            @endif
                            <br>
                            <textarea name="long_description" class="form-control" id="long_description" rows="15" placeholder="بدنه">{{ old('long_description') }}</textarea>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span><br><br>
                            @endif
                            <br>
                            <label for="category_id">دسته بندی:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span><br><br>
                            @endif
                            <br>
                            <input type="submit" value="افزودن" class="btn btn-success">
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
            'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
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
            'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
@endsection
