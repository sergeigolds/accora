@extends('layouts.app')

@section('content')
    <div id="hero-area">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                    <div class="contents">
                        <h1 class="head-title">Welcome to The Largest <span class="year">Marketplace</span></h1>
                        <p>Buy and sell everything from used cars to mobile phones and computers, or search for
                            property, jobs and more</p>
                        <div class="search-bar">
                            <div class="search-inner">
                                <form class="search-form" method="get" action="{{route('ads')}}">
                                    <div class="form-group form-group-search">
                                        <input type="text" name="search_field" class="form-control"
                                               placeholder="What are you looking for?">
                                    </div>
                                    <div class="form-group inputwithicon">
                                        <div class="select">
                                            <select name="category_id">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}">{{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <i class="lni-menu"></i>
                                    </div>
                                    <button class="btn btn-common" type="submit"><i class="lni-search"></i> Search Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="categories">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-xs-12">
                    <div id="categories-icon-slider" class="categories-wrapper owl-carousel owl-theme">
                        @foreach($categories as $category)
                            <div class="item">
                                <a href="{{ route('showCategory', $category->alias) }}">
                                    <div class="category-icon-item">
                                        <div class="icon-box">
                                            <div class="icon">
                                                <img src="assets/img/category/img-1.png" alt=""/>
                                            </div>
                                            <h4>{{ $category->title  }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 page-content">
                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show">
                                <div class="row">
                                    @if ($ads->count())
                                        @foreach ($ads as $ad)
                                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                                <div class="featured-box">
                                                    <figure>
                                                        <a href="{{ route('single', $ad)}}">
                                                            <img class="img-fluid"
                                                                 src="{{ $ad->image_src  }}"
                                                                 alt=""/>
                                                        </a>
                                                    </figure>
                                                    <div class="feature-content">
                                                        <h4><a href="{{ route('single', $ad)}}">{{ $ad->title  }}</a>
                                                        </h4>
                                                        <div class="meta-tag">
                                                            <span>
                                                              <a href="#">Category: {{ $ad->category->title  }}</a>
                                                            </span>
                                                        </div>
                                                        <div class="listing-bottom">
                                                            <h3 class="price float-left">${{ $ad->price  }}</h3>
                                                            <a href="{{ route('single', $ad)}}"
                                                               class="btn btn-common float-right">View
                                                                Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{ $ads->links() }}
                                    @else
                                        <p>There are no posts</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
