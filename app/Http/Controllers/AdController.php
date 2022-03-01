<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->active()->with(['user'])->paginate(4);

        $categories = DB::table('ads')
            ->whereDate('created_at', '>', now()->subMonths(3))
            ->distinct('category')
            ->pluck('category');

        return view('ads.index', [
            'ads' => $ads,
            'categories' => $categories
        ]);
    }

    public function single(Ad $ad)
    {
        return view('ads.single', [
            'ad' => $ad
        ]);
    }

    public function filterByCategory($category)
    {
        $ads = Ad::latest()->active()->with(['user'])->where('category', $category)->paginate(4);

        $categories = DB::table('ads')
            ->whereDate('created_at', '>', now()->subMonths(3))
            ->distinct('category')
            ->pluck('category');

        return view('ads.index', [
            'ads' => $ads,
            'categories' => $categories
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

    public function editAd(Ad $ad, Request $request)
    {
        $ad->update($request->only('title', 'description', 'price', 'category'));

        return back()->with('success', 'Ad successfully updated');
    }


    public function deleteAd(Ad $ad)
    {
        $this->authorize('delete', $ad);
        $ad->delete();

        return back();
    }


}
