@extends('includes.dashboard_html_structure')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">داشبورد</h1><br>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                ویرایش دسته بندی
                            </div>
                            <div class="card-body">
                                @if(isset($_GET['edit-category']) && !empty($_GET['edit-category']))
                                    <form action="{{ route('category.edit', ['category' => $_GET['edit-category']]) }}" method="POST" style="direction: rtl;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="put">
                                        <input type="text" name="category_name" placeholder="نام دسته بندی" class="form-control" value="{{ $category_for_edit->category_name }}">
                                        <br>
                                        <input type="submit" value="ویرایش" class="btn btn-warning" style="color: white;">
                                    </form>
                                @else
                                    <div style="direction: rtl; color: red;">
                                        فرم ویرایش دسته بندی غیر فعال است؛ برای ویرایش یک دسته بندی روی دکمه «ویرایش» در جدول زیر کلیک کنید.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-plus me-1"></i>
                                افزودن دسته بندی
                            </div>
                            <div class="card-body">
                                @if(!isset($_GET['edit-category']) || empty($_GET['edit-category']))
                                    <form action="{{ route('category.add') }}" method="POST" style="direction: rtl;">
                                        {{ csrf_field() }}
                                        <input type="text" name="category_name" placeholder="نام دسته بندی" class="form-control" required>
                                        <br>
                                        <input type="submit" value="افزودن" class="btn btn-success">
                                    </form>
                                @else
                                    <div style="direction: rtl; color: red;">
                                        فرم افزودن دسته بندی غیر فعال است؛ زیرا صفحه داشبورد در وضعیت ویرایش دسته بندی قرار دارد.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        دسته بندی ها
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام دسته بندی</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>@php echo ++$counter; @endphp</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('category.articles', ['category_id' => $category->id]) }}" target="_blank" class="btn btn-primary" style="margin-right: 3px;">نمایش مقالات مربوطه</a>
                                                <a href="/dashboard?edit-category={{ $category->id }}" class="btn btn-warning" style="color: white; margin-right: 3px;">ویرایش</a>
                                                <form action="{{ route('category.delete', ['category' => $category->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button onclick="if(confirm('آیا از حذف این دسته بندی مطمئـن هستید؟')){return true;}else{return false;}" class="btn btn-danger">حذف</button>
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
