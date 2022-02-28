@extends('layouts.app')

@section('content')
    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>
                        <div class="widget_search">
                            <form role="search" id="search-form">
                                <input
                                    type="search"
                                    class="form-control"
                                    autocomplete="off"
                                    name="s"
                                    placeholder="Search..."
                                    id="search-input"
                                    value=""
                                />
                                <button type="submit" id="search-submit" class="search-btn"><i class="lni-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="widget categories">
                            <h4 class="widget-title">All Categories</h4>
                            <ul class="categories-list">
                                <li>
                                    <a href="#">
                                        <i class="lni-dinner"></i>
                                        Hotel & Travels <span class="category-counter">(5)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-control-panel"></i>
                                        Services <span class="category-counter">(8)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-github"></i>
                                        Pets <span class="category-counter">(2)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-coffee-cup"></i>
                                        Restaurants <span class="category-counter">(3)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-home"></i>
                                        Real Estate <span class="category-counter">(4)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-pencil"></i>
                                        Jobs <span class="category-counter">(5)</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-display"></i>
                                        Electronics <span class="category-counter">(9)</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Advertisement</h4>
                            <div class="add-box">
                                <img class="img-fluid" src="assets/img/img1.jpg" alt=""/>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">
                    <div class="product-filter">
                        <div class="short-name">
                            <span>Showing (1 - 12 products of 7371 products)</span>
                        </div>
                        <div class="Show-item">
                            <span>Show Items</span>
                            <form class="woocommerce-ordering" method="post">
                                <label>
                                    <select name="order" class="orderby">
                                        <option selected="selected" value="menu-order">49 items</option>
                                        <option value="popularity">popularity</option>
                                        <option value="popularity">Average ration</option>
                                        <option value="popularity">newness</option>
                                        <option value="popularity">price</option>
                                    </select>
                                </label>
                            </form>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show">
                                <div class="row">
                                    @if ($ads->count())
                                        @foreach ($ads as $ad)
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
                                                              <a href="#">by John Smith</a>
                                                            </span> <span>
                                                              <a href="#">in {{ $ad->category  }}</a>
                                                            </span>
                                                        </div>
                                                        <p class="dsc">{{ Str::limit($ad->description, 150, $end='...') }}</p>
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
