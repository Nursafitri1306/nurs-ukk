<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(String $id){
            $like = Like::where('photoId', $id)->where('userId', auth()->user()->userId)->first();
            if ($like) {
                $like->delete();
                return back();
            } else {
                $tanggal = Carbon::now()->toDateTimeString();
            // dd($id);
                $like = new Like();
                $like->photoId = $id;
                $like->userId = auth()->user()->userId;
                $like->date_like = $tanggal;
                $like->save();
                return back();
            }
        }
}
