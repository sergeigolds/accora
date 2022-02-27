<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->with(['user'])->paginate(15);

        return view('ads.index', [
            'ads' => $ads
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
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $imageName = time() . '.' . $request->image_name->extension();
        $request->image_name->move(storage_path('app/images'), $imageName);

        $ad = array_merge(
            $request->only('title', 'description', 'price', 'category'),
            ['image_name' => $imageName]
        );

        $request->user()->ads()->create($ad);

        return back()->with('success', 'Ad successfully added');
    }

    public function single()
    {
        return view('ads.single');
    }
}
