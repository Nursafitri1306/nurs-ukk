@extends('layout.main')
@section('container')
<div class="row mb-4">
    @foreach ($photos as $photo)
        <div class="col-md-4">
            <div class="card mb-4">
                <img class="card-img-top" src="{{ asset('storage/' . $photo->file_location) }}" alt="" style="width: 100%;" />
                <div class="card-body">
                    <h5 class="card-title">Judul Foto : {{$photo->photo_title}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection