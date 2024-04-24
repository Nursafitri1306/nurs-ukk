@extends('admin.main')
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Profile</h3>
    </div>
    <div class="card-body">
        <div>
            <p>Username: {{ $user->username }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Nama Lengkap: {{ $user->full_name }}</p>
            <p>Alamat: {{ $user->address }}</p>
            <!-- Add more fields as needed -->
        </div>
    </div>
</div>

@endsection
