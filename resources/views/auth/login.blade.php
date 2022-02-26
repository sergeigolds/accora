@extends('layouts.app')

@section('content')

    <section class="login section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="login-form login-area">
                        <h3>Login Now</h3>
                        <form role="form" class="login-form" action="{{ route('login') }}" method="post" novalidate>
                            @csrf
                            @if (session('status'))
                                <div class="error-message login-error">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-envelope"></i>
                                    <input type="email" id="email"
                                           class="form-control @error('email') not-validated @enderror" name="email"
                                           placeholder="Your email address" value="{{ old('email') }}"/>
                                </div>
                                @error('email')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="password" id="password"
                                           class="form-control @error('password') not-validated @enderror"
                                           placeholder="Password"/>
                                </div>
                                @error('password')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="remember"/>
                                    <label class="custom-control-label" for="remember">Keep me logged in</label>
                                </div>
                                <a class="forgetpassword" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-common log-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
