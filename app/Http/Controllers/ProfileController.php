<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index($user)
    {

        $user = User::findOrFail($user);


        $CountPosts = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts()->count();
            }
        );
        $CountFollwers =Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();

            }
        );

        $CountFollowing = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            }
        );



        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('Profiles.index', [

            'user' => $user,
            'follows' => $follows,
            'CountPosts' => $CountPosts,
            'CountFollwers' => $CountFollwers,
            'CountFollowing' => $CountFollowing,
        ]);
    }
    public function Edit(User $user)
    {

        $this->authorize('update', $user->profile);

        return View('Profiles.EditProfile', compact('user'));
    }
    public function UpdateProfile(User $user)
    {

        $this->authorize('update', $user->profile);

        $data = request()->validate([

            'title' => 'required',

            'description' => 'required',

            'url' => 'url',

            'image' => '',
        ]);


        if (request('image')) {

            $ImagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$ImagePath}"))->fit(1000, 1000);

            $image->save();

            $ImageArray = ['image' => $ImagePath,];
        }


        auth()->user()->profile->update(array_merge(
            $data,
            $ImageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
