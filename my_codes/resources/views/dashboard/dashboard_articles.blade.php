@extends('includes.dashboard_html_structure')

@section('title', 'مقالات')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">مقالات</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        مقالات
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>تصویر مقاله</th>
                                    <th>نام مقاله</th>
                                    <th>دسته بندی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>@php echo ++$counter; @endphp</td>
                                        <td>
                                            <img src="{{ asset('images/articles_images/' . $article->image) }}" alt="تصویر نمایش داده نمی شود" style="width: 135px; height: 50px;">
                                        </td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ $article->category->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('single.article', ['article_id' => $article->id]) }}" target="_blank" class="btn btn-primary" style="margin-right: 3px;">مشاهده مقاله</a>
                                                <a href="{{ route('article.edit', ['article_id' => $article->id]) }}" class="btn btn-warning" style="margin-right: 3px; color: white;">ویرایش مقاله</a>
                                                <form action="{{ route('move.to.trash', ['article_id' => $article->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button onclick="if(confirm('آیا از انتقال این مقاله به سطل زباله مطمئـن هستید؟')){return true;}else{return false;}" class="btn btn-danger" style="margin-right: 3px;">انتقال به سطل زباله</button>
                                                </form>
                                                <form action="{{ route('article.delete', ['article_id' => $article->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button onclick="if(confirm('آیا از حذف کامل این مقاله اطمینان دارید؟')){return true;}else{return false;}" class="btn btn-danger" style="margin-right: 3px;">حذف کامل</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
