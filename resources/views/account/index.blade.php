@extends('layouts.app')

@section('content')
    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <x-sidebar/>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Dashboard</h2>
                            </div>
                            <div class="dashboard-wrapper">
                                <table class="table table-responsive dashboardtable tablemyads">
                                    <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Ad Status</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if ($ads->count())
                                        @foreach ($ads as $ad)
                                            <tr data-category="active">
                                                <td class="photo">
                                                    <img class="img-fluid"
                                                         src="{{ $ad->image_src  }}"
                                                         alt=""/>
                                                </td>
                                                <td data-title="Title">
                                                    <h3>{{ $ad->title }}</h3>
                                                </td>
                                                <td data-title="Category"><span
                                                        class="adcategories">Laptops & PCs</span></td>
                                                <td data-title="Ad Status"><span
                                                        class="adstatus adstatusactive">active</span>
                                                </td>
                                                <td data-title="Price">
                                                    <h3>{{ $ad->price }}€</h3>
                                                </td>
                                                <td data-title="Action">
                                                    <div class="btns-actions">
                                                        <a class="btn-action btn-view" href="{{ route('single', $ad)}}"
                                                           target="_blank"><i
                                                                class="lni-eye"></i>
                                                        </a>
                                                        <a class="btn-action btn-edit" href="{{ route('edit-ad', $ad)}}"><i
                                                                class="lni-pencil"></i>
                                                        </a>
                                                        @can('delete', $ad)
                                                            <form action="{{ route('delete-ad', $ad) }}" method="post" name="delete_ad">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn-action btn-delete"><i
                                                                        class="lni-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr data-category="expired">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="adnine"/>
                                                <label class="custom-control-label" for="adnine"></label>
                                            </div>
                                        </td>
                                        <td class="photo"><img class="img-fluid" src="assets/img/product/img9.jpg"
                                                               alt=""/></td>
                                        <td data-title="Title">
                                            <h3>Samsung Galaxy G550T On5 GSM Unlocked Smartphone</h3>
                                            <span>Ad ID: ng3D5hAMHPajQrM</span>
                                        </td>
                                        <td data-title="Category">Mobile</td>
                                        <td data-title="Ad Status"><span class="adstatus adstatusexpired">Expired</span>
                                        </td>
                                        <td data-title="Price">
                                            <h3>$129</h3>
                                        </td>
                                        <td data-title="Action">
                                            <div class="btns-actions">
                                                <a class="btn-action btn-view" href="#"><i class="lni-eye"></i></a>
                                                <a class="btn-action btn-edit" href="#"><i class="lni-pencil"></i></a>
                                                <a class="btn-action btn-delete" href="#"><i class="lni-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                {{ $ads->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
