@extends('layouts.app')

@section('content')
    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <x-sidebar/>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="row page-content">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="inner-box">
                                <div class="tg-contactdetail">
                                    <div class="dashboard-box">
                                        <h2 class="dashbord-title">Edit Profile</h2>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="dashboard-wrapper">
                                        <form action="{{route('profile-settings') }}" method="post" novalidate
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-3">
                                                <label class="control-label">Full Name</label>
                                                <input
                                                    class="form-control input-md @error('name') not-validated @enderror"
                                                    name="name" type="text"
                                                    value="{{ auth()->user()->name }}"/>
                                                @error('name')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="control-label">Email Address</label>
                                                <input
                                                    class="form-control input-md @error('email') not-validated @enderror"
                                                    name="email" type="email"
                                                    value="{{ auth()->user()->email }}"/>
                                                @error('email')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class=" form-group mb-3">
                                                <label class="control-label">Phone</label>
                                                <input
                                                    class="form-control input-md @error('phone') not-validated @enderror"
                                                    name="phone" type="tel"
                                                    value="{{ auth()->user()->phone }}"/>
                                                @error('phone')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class=" form-group mb-3">
                                                <label class="control-label">Old Pasword (leave it blank if you don't want to change it)</label>
                                                <input
                                                    class="form-control input-md @error('old_password') not-validated @enderror"
                                                    name="old_password" type="password"
                                                />
                                                @error('old_password')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class=" form-group mb-3">
                                                <label class="control-label">New Pasword</label>
                                                <input
                                                    class="form-control input-md @error('new_password') not-validated @enderror"
                                                    name="new_password" type="password"
                                                />
                                                @error('new_password')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class=" form-group mb-3">
                                                <label class="control-label">Retype Pasword</label>
                                                <input
                                                    class="form-control input-md @error('new_password_confirmation') not-validated @enderror"
                                                    name="new_password_confirmation" type="password"
                                                />
                                                @error('new_password_confirmation')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <div class="input-icon">--}}
                                            {{--                                                    <i class="lni-lock"></i>--}}
                                            {{--                                                    <input type="password" name="password_confirmation" id="password_confirmation"--}}
                                            {{--                                                           class="form-control @error('password_confirmation') not-validated @enderror"--}}
                                            {{--                                                           placeholder="Retype Password"/>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                @error('password_confirmation')--}}
                                            {{--                                                <div class="error-message">--}}
                                            {{--                                                    {{ $message }}--}}
                                            {{--                                                </div>--}}
                                            {{--                                                @enderror--}}
                                            {{--                                            </div>--}}
                                            <button class=" btn btn-common" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
