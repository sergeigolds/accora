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
                                @if (session('success'))
                                    <div class="alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            @if ($ads->count())
                                <div class="dashboard-wrapper">
                                    <table class="table table-responsive dashboardtable tablemyads">
                                        <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ads as $ad)
                                            <tr data-category="active">
                                                <td class="photo">
                                                    <img class="img-fluid"
                                                         src="{{ $ad->image_src  }}"
                                                         alt=""/>
                                                </td>
                                                <td data-title="Title">
                                                    <h3>{{ $ad->title }}</h3></td>
                                                <td data-title="Category"><span
                                                        class="adcategories">{{ $ad->category->title }}</span>
                                                </td>
                                                <td data-title="Date">
                                                    <h3>{{ $ad->created_at->diffForHumans() }}</h3>
                                                </td>
                                                <td data-title="Ad Status">
                                                    @if($ad->isExpired())
                                                        <span class="adstatus adstatusexpired">Expired</span>
                                                    @else
                                                        <span class="adstatus adstatusactive">Active</span>
                                                    @endif
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
                                                        @if(!$ad->isExpired())
                                                            <a class="btn-action btn-edit"
                                                               href="{{ route('edit-ad', $ad)}}"><i
                                                                    class="lni-pencil"></i>
                                                            </a>
                                                        @endif
                                                        @can('delete', $ad)
                                                            <form action="{{ route('delete-ad', $ad) }}" method="post"
                                                                  name="delete_ad"
                                                                  id="delete_ad">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="btn-action btn-delete"><i
                                                                        class="lni-trash"></i>
                                                                </div>
                                                            </form>
                                                            <div class="modal fade" id="delete-modal" tabindex="-1"
                                                                 role="dialog" aria-labelledby="exampleModalLabel"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Are you sure you
                                                                                want to delete?</h5>
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">No
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    id="submit-delete">Yes
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $ads->links() }}
                                </div>
                            @else
                                <h5>There are no ads</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
