<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(String $id)
    {
        if (auth()->check()) {
            $like = Like::where('photoId', $id)->where('userId', auth()->user()->userId)->first();
            if ($like) {
                $like->delete();
            } else {
                $tanggal = Carbon::now()->toDateTimeString();
                $like = new Like();
                $like->photoId = $id;
                $like->userId = auth()->user()->userId;
                $like->date_like = $tanggal;
                $like->save();
            }
            return back();
        } else {
            // Redirect user to login page if not authenticated
            return redirect()->route('login')->with('error', 'Anda harus login untuk memberikan suka.');
        }
    }
}
