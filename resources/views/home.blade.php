@extends('layouts.app')
@section('title', 'FILKOM TemuIn - Temukan barangmu kembali')

@section('content')
<section class="hero">
    <div>
        <span class="hero-tag">Lost &amp; Found FILKOM UB</span>
        <h1>Temukan barangmu <em>kembali.</em></h1>
        <p>Cek daftar barang temuan di lingkungan FILKOM UB dan ambil barangmu
           setelah dicek langsung oleh petugas.</p>
        <form action="{{ route('catalog') }}" method="GET" class="search-bar">
            <input type="text" name="q" placeholder="Cari barang, misalnya dompet atau botol...">
            <button class="btn btn-orange">Cari Barang</button>
        </form>
    </div>
    <div class="hero-art">
        <img src="{{ asset('images/logo FILKOM TemuIn.PNG') }}" alt="Maskot harimau detektif FILKOM">
    </div>
</section>

<section class="stats">
    <div class="stat"><b>{{ $totalFound }}</b><span>Barang ditemukan</span></div>
    <div class="stat"><b>{{ $totalReturned }}</b><span>Barang sudah dikembalikan</span></div>
</section>

<section>
    <h2>Cara menggunakan layanan</h2>
    <div class="steps" style="margin-top:18px">
        <div class="step"><div class="step-num">1</div><h3>Cari di katalog</h3>
            <p>Telusuri barang temuan berdasarkan nama, kategori, atau lokasi.</p></div>
        <div class="step"><div class="step-num">2</div><h3>Datang ke lokasi penyimpanan</h3>
            <p>Lihat keterangan lokasi pada barang di katalog, lalu datangi tempat tersebut.</p></div>
        <div class="step"><div class="step-num">3</div><h3>Cek &amp; ambil barangmu</h3>
            <p>Periksa barangnya langsung. Jika benar milikmu, petugas mencatat datamu dan memotret serah terima.</p></div>
    </div>
</section>

<section class="info-box">
    <div>
        <h3>Menemukan barang?</h3>
        <p>Serahkan langsung ke Security di <b>Lobby Gedung F</b>. Petugas akan mencatatnya ke sistem.</p>
    </div>
    <a href="{{ route('catalog') }}" class="btn btn-orange">Lihat Katalog</a>
</section>
@endsection