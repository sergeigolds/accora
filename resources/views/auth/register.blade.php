@extends('layouts.app')

@section('content')
    <section class="register section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>Register</h3>
                        <form class="login-form" action="{{ route('register') }}" method="post" novalidate>
                            @csrf
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" id="name"
                                           class="form-control @error('name') not-validated @enderror" name="name"
                                           placeholder="Your full name" value="{{ old('name') }}"/>
                                    @error('name')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
                                    <i class="lni-phone-handset"></i>
                                    <input type="tel" id="phone"
                                           class="form-control @error('phone') not-validated @enderror" name="phone"
                                           placeholder="Your phone number" value="{{ old('phone') }}"/>
                                </div>
                                @error('phone')
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
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control @error('password_confirmation') not-validated @enderror"
                                           placeholder="Retype Password"/>
                                </div>
                                @error('password_confirmation')
                                <div class="error-message">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-common log-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



