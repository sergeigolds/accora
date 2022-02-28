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
                                    <div class="dashboard-wrapper">
                                        <div class="form-group mb-3">
                                            <strong>I’m a:</strong>
                                            <div class="tg-selectgroup">
                          <span class="tg-radio">
                            <input id="tg-sameuser" type="radio" name="usertype" value="same user" checked=""/>
                            <label for="tg-sameuser">Same User</label>
                          </span>
                                                <span class="tg-radio">
                            <input id="tg-someoneelse" type="radio" name="usertype" value="someone else"/>
                            <label for="tg-someoneelse">Someone Else</label>
                          </span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">First Name*</label>
                                            <input class="form-control input-md" name="name" type="text"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Last Name*</label>
                                            <input class="form-control input-md" name="name" type="text"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Phone*</label>
                                            <input class="form-control input-md" name="phone" type="text"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Enter Address</label>
                                            <input class="form-control input-md" name="address" type="text"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Enter Address</label>
                                            <input class="form-control input-md" name="address" type="text"/>
                                        </div>
                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">Country</label>
                                            <div class="tg-select form-control">
                                                <select>
                                                    <option value="none">Select Country</option>
                                                    <option value="none">New York</option>
                                                    <option value="none">California</option>
                                                    <option value="none">Washington</option>
                                                    <option value="none">Birmingham</option>
                                                    <option value="none">Chicago</option>
                                                    <option value="none">Phoenix</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">State</label>
                                            <div class="tg-select form-control">
                                                <select>
                                                    <option value="none">Select State</option>
                                                    <option value="none">Select State</option>
                                                    <option value="none">Select State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">City</label>
                                            <div class="tg-select form-control">
                                                <select>
                                                    <option value="none">Select State</option>
                                                    <option value="none">Select State</option>
                                                    <option value="none">Select State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tg-checkbox">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="tg-agreetermsandrules"/>
                                                <label class="custom-control-label" for="tg-agreetermsandrules"
                                                >I agree to all <a href="javascript:void(0);">Terms of Use &amp; Posting
                                                        Rules</a></label
                                                >
                                            </div>
                                        </div>
                                        <button class="btn btn-common" type="button">Post Ad</button>
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
