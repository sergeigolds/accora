<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->with(['user'])->paginate(4);

        return view('ads.index', [
            'ads' => $ads
        ]);
    }

    public function single(Ad $ad)
    {
        return view('ads.single', [
            'ad' => $ad
        ]);
    }


    public function showAdForm()
    {
        $adsCategory = [
            'Cars',
            'Cloths',
            'Electronics',
            'Toys',
            'Bicycles',
            'Furniture',
            'Pets'
        ];
        return view('account.post-ad', [
            'ads_category' => $adsCategory
        ]);
    }

    public function saveAd(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image_src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $imageName = time() . '.' . $request->image_src->extension();
        $request->image_src->move(storage_path('app/public/images'), $imageName);
        $imagePath = '/storage/images/' . $imageName;

        $ad = array_merge(
            $request->only('title', 'description', 'price', 'category'),
            ['image_src' => $imagePath]
        );

        $request->user()->ads()->create($ad);

        return back()->with('success', 'Ad successfully added');
    }

    public function deleteAd(Ad $ad)
    {
        $this->authorize('delete', $ad);
        $ad->delete();

        return back();
    }

    public function showEditForm(Ad $ad)
    {
        $adsCategory = [
            'Cars',
            'Cloths',
            'Electronics',
            'Toys',
            'Bicycles',
            'Furniture',
            'Pets'
        ];

        return view('account.post-ad', [
            'ad' => $ad,
            'ads_category' => $adsCategory
        ]);
    }

    public function editAd(Ad $ad, Request $request)
    {
        $ad->update($request->only('title', 'description', 'price', 'category'));

        return back()->with('success', 'Ad successfully updated');
    }


}
