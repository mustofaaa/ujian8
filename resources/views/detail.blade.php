@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Article List</h1>
        <div class="col-12">
            <div class="card" style="">
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->judul }}</h5>
                    <p class="card-text">{{ $post->isi }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $post->penulis }}</li>
                    <li class="list-group-item">{{ $post->tgl }}</li>
                </ul>
            </div>

            {{-- <div class="container"> --}}

            {{-- </div> --}}
        </div>
    </div>
    <div class="row mt-4 justify-content-between">
        @foreach ($produk as $p)
        <div class="col-4">
            <div class="card ">
                <div class="card-body">
                    <p>{{ $p->nama }}</p>
                    <img src="{{ asset('storage/'. $p->image) }}" class="card-img-top">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
