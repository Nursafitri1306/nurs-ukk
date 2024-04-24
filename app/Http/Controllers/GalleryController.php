<?php

namespace App\Http\Controllers;
use App\Models\Photo;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $photo = Photo::join('albums', 'albums.albumId', '=', 'photos.albumId')->get();
        return view('gallery.index', compact('photo'));
    }
}
