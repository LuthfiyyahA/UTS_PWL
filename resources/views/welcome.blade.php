@extends('layouts.template') <!-- Menggunakan layout utama dari folder layouts -->

@section('content') <!-- Awal section untuk isi konten halaman -->

    <!-- Kartu tampilan berisi sapaan -->
    <div class="card">
        <!-- Header dari kartu -->
        <div class="card-header">
            <!-- Judul pada header -->
            <h3 class="card-title">Halo, apakabar!!!</h3>
            <div class="card-tools"></div> <!-- Tempat untuk menambahkan tombol/tool lain jika diperlukan -->
        </div>

        <!-- Isi utama dari kartu -->
        <div class="card-body">
            Selamat datang semua, ini adalah halaman utama dari aplikasi ini.
        </div>
    </div>

@endsection <!-- Akhir section konten -->