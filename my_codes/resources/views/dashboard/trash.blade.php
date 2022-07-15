@extends('includes.dashboard_html_structure')

@section('icon', asset('/images/icons/trash.png'))

@section('title', 'سطل زباله')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">سطل زباله</h1><br>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        سطل زباله
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
                                        <td style="width: 140px;">
                                            <img src="{{ asset('images/trash_images/' . $article->image) }}" alt="تصویر نمایش داده نمی شود" style="width: 135px; height: 50px;">
                                        </td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ $article->category->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('article.recovery', ['article_id' => $article->id]) }}" style="margin-right: 3px;" class="btn btn-success">بازیابی</a>
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
