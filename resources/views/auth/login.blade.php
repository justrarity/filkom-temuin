@extends('layouts.app')
@section('title', 'Masuk Petugas')

@section('content')
<div class="box" style="text-align:center">
    <img src="{{ asset('images/logo FILKOM TemuIn.PNG') }}" alt="Maskot FILKOM TemuIn" style="width:120px; margin-bottom:8px">
    <h2>Masuk Petugas</h2>
    <p class="item-meta" style="margin-bottom:18px">Khusus Security dan Petugas Kebersihan (OB) FILKOM UB.</p>

    @if($errors->any())
        <div class="alert alert-error" style="text-align:left">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.process') }}" style="text-align:left">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div style="display:flex; gap:8px">
                <input type="password" id="password" name="password" required>
                <button type="button" class="btn btn-outline btn-small" onclick="togglePassword()" id="toggleBtn">Tampil</button>
            </div>
        </div>
        <button class="btn" style="width:100%">Masuk</button>
    </form>
</div>

<script>
function togglePassword() {
    var input = document.getElementById('password');
    var btn = document.getElementById('toggleBtn');
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = 'Sembunyi';
    } else {
        input.type = 'password';
        btn.textContent = 'Tampil';
    }
}
</script>
@endsection