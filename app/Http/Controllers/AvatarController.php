<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
   public function update(UpdateAvatarRequest $request){
    $file = $request->file('avatar');
    $fileName = $file->hashName();
    $file->storeAs('avatars', $fileName, 'public');
    $path = $fileName;

    if($oldAvatar = $request->user()->avatar){
        Storage::disk('public')->delete($oldAvatar);
    }
    $avatar = auth()->user()->update([
        'avatar' => $path
    ]);


    // dd($avatar);

    // return redirect()->route('profile.edit');
    return back()->with('success', 'Avatar changed');
   }
}
