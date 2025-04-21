@extends('layouts.template') <!-- Menggunakan layout utama dari folder layouts -->

@section('content') <!-- Awal section untuk isi konten halaman -->

    <!-- Kartu tampilan berisi sapaan -->
    <div class="card">
        <!-- Header dari kartu -->
        <div class="card-header">
            <!-- Judul pada header -->
            <h3 class="card-title">Selamat Datang</h3>
            <div class="card-tools"></div> <!-- Tempat untuk menambahkan tombol/tool lain jika diperlukan -->
        </div>

        <!-- Isi utama dari kartu -->
        <div class="card-body">
            <img src="{{ asset('images/ukm.jpg') }}" alt="Gambar UKM" class="img-fluid mb-3" style="max-width: 600px;">
        </div>
    </div>

@endsection <!-- Akhir section konten -->