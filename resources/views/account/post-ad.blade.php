@extends('layouts.app')

@section('content')
    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <x-sidebar/>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <form action="{{ isset($ad) ? route('edit-ad', $ad) : route('post-ad') }}" method="post" novalidate
                          enctype="multipart/form-data">
                        @csrf
                        @if(isset($ad))
                            @method('PUT')
                        @endif
                        <div class="row page-content">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="inner-box">
                                    <div class="dashboard-box">
                                        <h2 class="dashbord-title">Ad Detail</h2>
                                    </div>
                                    <div class="dashboard-wrapper">
                                        <div class="form-group mb-3">
                                            <label class="control-label">Title</label>
                                            <input class="form-control input-md @error('title') not-validated @enderror"
                                                   id="title"
                                                   name="title"
                                                   placeholder="Title"
                                                   type="text"
                                                   @if(isset($ad))
                                                   value="{{ $ad->title }}"
                                                   @else
                                                   value="{{ old('title') }}"
                                                @endif
                                            />
                                            @error('title')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Description</label>
                                            @if(isset($ad))
                                                <textarea
                                                    class="form-control input-md @error('description') not-validated @enderror"
                                                    id="description"
                                                    name="description"
                                                    placeholder="Description"
                                                    rows="6"
                                                    type="text">{{ $ad->description }}</textarea>
                                            @else
                                                <textarea
                                                    class="form-control input-md @error('description') not-validated @enderror"
                                                    id="description"
                                                    name="description"
                                                    placeholder="Description"
                                                    rows="6"
                                                    type="text">@if (old('description') != null){{ old('description') }}@endif</textarea>
                                            @endif
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
                                                   @if(isset($ad))
                                                   value="{{ $ad->price }}"
                                                   @else
                                                   value="{{ old('price') }}"
                                                @endif
                                            />
                                            @error('price')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 tg-inputwithicon">
                                            <label class="control-label">Categories</label>
                                            <div
                                                class="tg-select form-control @error('category_id') not-validated @enderror">
                                                <select name='category_id' id='category_id'>
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option
                                                            @if(isset($ad) && $ad->category_id == $category->id)
                                                            value="{{ $category->id }}"
                                                            selected>{{ $category->title }}
                                                            @else
                                                                value="{{ $category->id }}">{{ $category->title }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        @if(isset($ad))
                                            <div class="change-image">
                                                <div>Current ad image</div>
                                                <img class="uploaded-image" src="{{ $ad->image_src  }}" alt="">
                                                <a class="btn btn-common change-img-btn">Change image</a>
                                            </div>
                                        @endif
                                        <label class="tg-fileuploadlabel {{ isset($ad) ? 'hidden-upload' : '' }}"
                                               for="image_src">
                                            <span>{{ isset($ad) ? 'Change image of your ad' : 'Add image to your ad' }}</span>
                                            <span class="btn btn-common upload-file-btn">Select Image</span>
                                            <input
                                                class="form-control input-md @error('image_src') not-validated @enderror"
                                                id="image_src" name="image_src"
                                                placeholder="Image src"
                                                type="file"/>
                                            @error('image_src')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </label>
                                        <button class="btn btn-common"
                                                type="submit"
                                                style="display: block">{{ isset($ad) ? 'Save Ad' : 'Post Ad' }}</button>
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
