<?php

namespace App\Http\Controllers;

use App\Filters\AdFilter;
use App\Mail\ContactForm;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class AdController extends Controller
{
    public function index(AdFilter $request)
    {
        $ads = Ad::filter($request)->latest()->active()->with(['user'])->paginate(15);

        return view('ads.index', [
            'ads' => $ads,
        ]);
    }

    public function single(Ad $ad)
    {
        return view('ads.single', [
            'ad' => $ad
        ]);
    }

    public function showCategory($cat_alias)
    {
        $cat = Category::where('alias', $cat_alias)->first();
        $ads = Ad::latest()->active()->with(['user'])->where('category_id', $cat->id)->paginate(4);

        return view('ads.index', [
            'ads' => $ads,
            'cat' => $cat
        ]);
    }

    public function showAdForm()
    {
        return view('account.post-ad');
    }

    public function showEditForm(Ad $ad)
    {

        return view('account.post-ad', [
            'ad' => $ad
        ]);
    }

    public function createAd(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image_src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $imageName = time() . '.' . $request->image_src->extension();
        $request->image_src->move(storage_path('app/public/images'), $imageName);
        $imagePath = '/storage/images/' . $imageName;

        $ad = array_merge(
            $request->only('title', 'description', 'price', 'category_id'),
            ['image_src' => $imagePath]
        );

        $request->user()->ads()->create($ad);

        return redirect()->route('account')->with('success', 'Ad successfully updated');
    }

    public function editAd(Ad $ad, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        if (request()->allFiles()) {
            $this->validate($request, [
                'image_src' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            ]);

            $path = storage_path('/app/public/images/' . basename($ad->image_src));
            File::delete($path);

            $imageName = time() . '.' . $request->image_src->extension();
            $request->image_src->move(storage_path('app/public/images'), $imageName);
            $imagePath = '/storage/images/' . $imageName;

            $query = array_merge(
                $request->only('title', 'description', 'price', 'category_id'),
                ['image_src' => $imagePath]
            );
            $ad->update($query);
        } else {
            $ad->update($request->only('title', 'description', 'price', 'category_id'));
        }

        return redirect()->route('account')->with('success', 'Ad successfully updated');
    }


    public function deleteAd(Ad $ad)
    {
        $this->authorize('delete', $ad);
        $ad->delete();

        return back();
    }

    public function sendEmail(Request $request)
    {

        $user =  User::find($request->user_id);

        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'email' => $request->email,
            'message' => $request->message
        );

        Mail::to($user)->send(new ContactForm($data));
        return back()->with('success', 'Message successfully sent');
    }
}
