@extends('layouts.app')
@section('title', 'Katalog Barang Temuan')

@section('content')
<h1>Katalog Barang Temuan</h1>

<form method="GET" style="display:flex; gap:8px; margin:16px 0;">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari barang..."
           style="flex:1; padding:10px;">
    <select name="category" style="padding:10px;">
        <option value="">Semua Kategori</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @selected(request('category') == $cat->id)>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
    <button class="btn">Cari</button>
</form>

<div class="grid">
@forelse($items as $item)
    <div class="card">
        <img src="{{ $item->photo ? asset('storage/'.$item->photo) : asset('images/no-image.png') }}"
             alt="{{ $item->name }}">
        <div class="card-body">
            <h3>{{ $item->name }}</h3>
            <p>{{ $item->category->name }} • {{ $item->color }}</p>
            <p>Ditemukan: {{ $item->found_location }}</p>
            <p>{{ $item->found_at->format('d M Y, H:i') }}</p>
            <p>Disimpan di: {{ $item->storageLocation->name }}</p>
            <span class="badge {{ $item->status == 'sudah_diambil' ? 'badge-sudah' : 'badge-belum' }}">
                {{ $item->status == 'sudah_diambil' ? 'Sudah diambil' : 'Belum diambil' }}
            </span>
        </div>
    </div>
@empty
    <p>Belum ada barang yang cocok.</p>
@endforelse
</div>

<div style="margin-top:20px">{{ $items->links() }}</div>
@endsection