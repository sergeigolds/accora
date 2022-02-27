@extends('layouts.app')

@section('content')
    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <figure>
                                    <a href="#"><img src="assets/img/author/img1.jpg" alt=""/></a>
                                </figure>
                                <div class="usercontent">
                                    <h3>Hello William!</h3>
                                    <h4>Administrator</h4>
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li>
                                        <a href="dashboard.html">
                                            <i class="lni-dashboard"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-profile-setting.html">
                                            <i class="lni-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-myads.html">
                                            <i class="lni-layers"></i>
                                            <span>My Ads</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="lni-envelope"></i>
                                            <span>Offers/Messages</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="payments.html">
                                            <i class="lni-wallet"></i>
                                            <span>Payments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-favourite-ads.html">
                                            <i class="lni-heart"></i>
                                            <span>My Favourites</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account-profile-setting.html">
                                            <i class="lni-star"></i>
                                            <span>Privacy Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="lni-enter"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Advertisement</h4>
                            <div class="add-box">
                                <img class="img-fluid" src="assets/img/img1.jpg" alt=""/>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <form action="{{ route('post-ad') }}" method="post" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row page-content">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="inner-box">
                                    <div class="dashboard-box">
                                        <h2 class="dashbord-title">Ad Detail</h2>
                                    </div>
                                    <div class="dashboard-wrapper">
                                        @if (session('success'))
                                            <div class="alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <div class="form-group mb-3">
                                            <label class="control-label">Title</label>
                                            <input class="form-control input-md @error('title') not-validated @enderror"
                                                   id="title"
                                                   name="title"
                                                   placeholder="Title"
                                                   type="text"
                                                   value="{{ old('title') }}"/>
                                            @error('title')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Description</label>
                                            <textarea
                                                class="form-control input-md @error('description') not-validated @enderror"
                                                id="description"
                                                name="description"
                                                placeholder="Description"
                                                type="text">@if (old('description') != null){{ old('description')  }}@endif</textarea>
                                            @error('description')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label">Price</label>
                                            <input class="form-control input-md @error('price') not-validated @enderror"
                                                   id="price" name="price"
                                                   placeholder="Price"
                                                   type="number"
                                                   value="{{ old('price') }}"/>
                                            @error('price')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">Categories</label>
                                            <div
                                                class="tg-select form-control @error('category') not-validated @enderror">
                                                <select name='category' id='category'>
                                                    <option value="">Select Category</option>
                                                    @foreach ($ads_category as $category)
                                                        <option
                                                            value="{{ strtolower($category)  }}">{{ $category  }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <label class="tg-fileuploadlabel" for="image_name">
                                            <span>Add image to your ad</span>
                                            <span class="btn btn-common upload-file-btn">Select Files</span>
                                            <input
                                                class="form-control input-md @error('image_name') not-validated @enderror"
                                                id="image_name" name="image_name"
                                                placeholder="Image src"
                                                type="file"/>
                                            @error('image_name')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>

                                        <button class="btn btn-common" type="submit">Post Ad</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
