@extends('layouts.app')

@section('content')
    <div class="section-padding" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="product-info row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="details-box">
                        <div class="item">
                            <div class="product-img">
                                <img class="img-fluid" src="{{ $ad->image_src  }}" alt=""/>
                            </div>
                            <span class="price">${{ $ad->price }}</span>
                        </div>
                        <div class="ads-details-info">
                            <h2>{{ $ad->title }}</h2>
                            <p class="mb-4">{{ $ad->description }}</p>
                        </div>
                        <div class="tag-bottom">
                            <div class="float-left">
                                <ul class="advertisement">
                                    <li>
                                        <p>
                                            <strong><i class="lni-alarm-clock"></i>
                                                Date:</strong> {{date('d-m-Y', strtotime($ad->created_at))  }}
                                            <strong><i class="lni-folder ml-2"></i> Categories:</strong> <a
                                                href="/?category_id={{$ad->category->id}}">{{ $ad->category->title }}</a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <aside class="details-sidebar">
                        <div class="widget">
                            @if (session('success'))
                                <div class="alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('sendEmail') }}" method="POST" novalidate>
                                @csrf
                                <h4 class="widget-title">Ad Posted By</h4>
                                <div class="agent-inner">
                                    <div class="agent-title">
                                        <div class="agent-details">
                                            <h3>{{ $ad->user->name }}</h3>
                                            @if($ad->user->phone)
                                                <span><i class="lni-phone-handset"></i>{{ $ad->user->phone }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" id='user_id' value="{{ $ad->user->id }}"/>
                                    @if (auth()->user())
                                        <input type="hidden" name="email" id='email' value="{{auth()->user()->email}}"/>
                                    @else
                                        <input type="email" name="email" id='email'
                                               class="@error('email') not-validated @enderror"
                                               value="{{old('email')}}"
                                               placeholder="Your email"/>
                                    @endif
                                    @error('email')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <textarea name="message" id="message" rows="4"
                                              class="@error('message') not-validated @enderror"
                                              placeholder="Your message">{{old('message')}}</textarea>
                                    @error('message')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <button type="submit" class="btn btn-common fullwidth mt-4">Send Message</button>
                                </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
