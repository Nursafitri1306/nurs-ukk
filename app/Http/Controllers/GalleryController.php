<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Like;
use App\Models\Photo;

use App\Models\PhotoComment;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $photo = Photo::join('albums', 'albums.albumId', '=', 'photos.albumId')->get();
        return view('gallery.index', compact('photo'));
    }
    
    public function detail($photoId)
    {
        $jumlahKomentar = PhotoComment::where('photoId', $photoId)->count();
        $likes= Like::get();
        $comment = PhotoComment::get();
        return view('detail.index', compact('like', 'comment', 'jumlahKomentar'));
    }

    public function detail_album($id)
    {
    $photos = Photo::join('albums', 'albums.albumId', '=', 'photos.albumId')
                    ->where('photos.albumId', $id)
                    ->get(['photos.*', 'albums.album_name', 'albums.description', 'albums.date_created']);

    return view('detail-album', compact('photos'));
    }

}
