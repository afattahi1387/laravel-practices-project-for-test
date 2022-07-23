<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ورود | {{ env('APP_NAME') }}</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">ورود | <a href="{{ env('APP_URL') }}" style="text-decoration: none;">{{ env('APP_NAME') }}</a></h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('login') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-floating mb-3">
                                                <input class="form-control @if($errors->has('email')) is-invalid @endif" name="email" id="email" value="{{ old('email') }}" type="email" placeholder="ایمیل" />
                                                <label for="email">ایمیل</label>
                                                @if($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="password" type="password" placeholder="رمز عبور" />
                                                <label for="password">رمز عبور</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" {{ old('remember') ? 'checked' : '' }} name="remember" id="remember" type="checkbox" />
                                                <label class="form-check-label" for="remember">مرا به خاطر بسپار</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" value="ورود">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
