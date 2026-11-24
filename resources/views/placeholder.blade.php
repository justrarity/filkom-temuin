@extends('layouts.app')
@section('title', $judul)

@section('content')
<div class="box" style="text-align:center">
    <img src="{{ asset('images/maskot.png') }}" alt="" style="width:110px">
    <h2>{{ $judul }}</h2>
    <p class="item-meta" style="margin:8px 0 16px">
        Login berhasil sebagai <b>{{ auth()->user()->name }}</b>
        ({{ auth()->user()->role === 'pelapor' ? 'Pelapor' : 'Security' }}).
        Halaman ini sedang dalam pengerjaan.
    </p>
    <a href="{{ route('catalog') }}" class="btn btn-outline btn-small">Lihat Katalog</a>
</div>
@endsection