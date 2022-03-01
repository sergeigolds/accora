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
                                @foreach($categories as $category)
                                    <li>
                                        <a href="/ads/cat/{{$category}}">
                                            {{ucfirst($category)}}<span class="category-counter">(5)</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">
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
