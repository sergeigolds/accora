<?php

namespace App\Http\Controllers;

use App\Filters\AdFilter;
use App\Http\Requests\AdRequest;
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
        $categories = Category::orderBy('id')->get();
        $ads = Ad::filter($request)->latest()->active()->with(['user'])->paginate(15);

        return view('ads.index', [
            'ads' => $ads,
            'categories' => $categories,
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
        $categories = Category::orderBy('id')->get();
        return view('account.post-ad', [
            'categories' => $categories,
        ]);
    }

    public function showEditForm(Ad $ad)
    {
        $categories = Category::orderBy('id')->get();
        return view('account.post-ad', [
            'ad' => $ad,
            'categories' => $categories,
        ]);
    }

    public function create(AdRequest $request)
    {
        $imageName = time() . '.' . $request->image_src->extension();
        $request->image_src->move(storage_path('app/public/images'), $imageName);
        $imagePath = '/storage/images/' . $imageName;

        $ad = array_merge(
            $request->only('title', 'description', 'price', 'category_id'),
            ['image_src' => $imagePath]
        );

        $request->user()->ads()->create($ad);

        return redirect()->route('account')->with('success', 'Ad successfully created');
    }

    public function edit(Ad $ad, AdRequest $request)
    {
        if ($request->image_src) {
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


    public function delete(Ad $ad)
    {
        $this->authorize('delete', $ad);
        $ad->delete();

        $path = storage_path('/app/public/images/' . basename($ad->image_src));
        File::delete($path);

        return redirect()->route('account')->with('success', 'Ad successfully deleted');
    }

    public function sendEmail(Request $request)
    {

        $user = User::find($request->user_id);

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
