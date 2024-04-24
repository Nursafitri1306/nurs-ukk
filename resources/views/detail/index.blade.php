@extends('layout.main')
@section('container')

<div class="container py-5">
      <div class="col-lg-8">
        <div class="d-flex flex-column text-left mb-3">
          <h1 class="mb-3">{{ $photo->photo_title }}</h1>
        </div>
        <div class="mb-5">
          <img class="card-img-top mb-2" src="{{ asset('storage/' . $photo->file_location) }}" alt="" style="width: 400px;" />
          <div class="d-flex mb-3">
            <p class="mr-3"><i class="bi bi-person-fill"></i> {{ $photo->user->full_name }}</p>
            <p class="mr-3"><i class="bi bi-folder-fill"></i> {{ $photo->album_name }}</p>
            <p class="mr-3 like-icon"><a href="/detail/{{$photo->photoId}}/like"><i class="bi bi-heart">{{$like}}</i></a></p>
            <p class="mr-3"><i class="bi bi-chat-fill"></i>{{ $photo->comments_count }}</p>
          </div>  
          <p>{{ $photo->photo_description }}</p>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">
              <div class="card-header">
                Komentar
              </div>
              <div class="card-body">
                @foreach ($comment as $singleComment)
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title">Nama: <b>{{ $singleComment->user->full_name }}</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Komentar: <b>{{ $singleComment->comment_content }}</b></h6>
                  </div>
                </div>
                @endforeach              
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card-body p-4">
              <form id="commentForm" method="post" action="/detail/{{ $photoId }}" class="mb-5">
                @csrf
                <div class="text-center ml-5 mr-5">
                  <h5><b><p style="font-family:Perpetua; margin-top:20px;">Komentar</p></b></h5>
                </div>
                <small style="line-height:5px"></small>
                <div class="form-floating mb-3">
                  <textarea class="form-control @error('comment_content') is-invalid @enderror" id="comment_content" name="comment_content" style="height: 100px" required data-parsley-trigger="keyup">{{ old('comment_content') }}</textarea>
                  @error('comment_content')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
    
                <div class="form-floating mb-3">
                  <button type="submit" class="btn btn-primary custom-button">Kirim</button>
                </div>
              </form>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
