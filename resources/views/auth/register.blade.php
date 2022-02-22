@extends('layouts.app')

@section('content')
    <section class="register section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>Register</h3>
                        <form class="login-form">
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" id="Name" class="form-control" name="email"
                                           placeholder="Username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-envelope"></i>
                                    <input type="text" id="sender-email" class="form-control" name="email"
                                           placeholder="Email Address"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" class="form-control" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" class="form-control" placeholder="Retype Password"/>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkedall"/>
                                    <label class="custom-control-label" for="checkedall">By registering, you accept our
                                        Terms & Conditions</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-common log-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



