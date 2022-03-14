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
                        @isset($ad)
                            @method('PUT')
                        @endisset
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
                                                   value="{{ isset($ad) ? $ad->title : old('title') }}"
                                            />
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
                                                rows="6"
                                                type="text">{{ isset($ad) ? $ad->description : old('description') }}</textarea>
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
                                                   value="{{ isset($ad) ? $ad->price : old('price') }}"
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
                                                            value="{{ $category->id }}"
                                                            @if(isset($ad) && $ad->category_id == $category->id || old('category_id') == $category->id)
                                                            selected
                                                            @endif
                                                        >{{ $category->title }}
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

                                        @isset($ad)
                                            <div class="change-image">
                                                <div>Current ad image</div>
                                                <img class="uploaded-image" src="{{ $ad->image_src  }}" alt="">
                                                <a class="btn btn-common change-img-btn">Change image</a>
                                            </div>
                                        @endisset
                                        <label class="tg-fileuploadlabel {{ isset($ad) ? 'hidden-upload' : '' }}"
                                               for="image_src">
                                            <span>{{ isset($ad) ? 'Change image of your ad' : 'Add image to your ad' }}</span>
                                            <span class="btn btn-common upload-file-btn">Select Image</span>
                                            <input
                                                class="form-control input-md @error('image_src') not-validated @enderror"
                                                id="image_src" name="image_src"
                                                placeholder="Image src"
                                                type="file"/>
                                        </label>
                                        @error('image_src')
                                        <div class="error-message">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
