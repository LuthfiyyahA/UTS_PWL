@extends('layouts.template') <!-- Menggunakan template layout utama -->

@section('content') <!-- Memulai section konten utama -->

    <!-- Kartu tampilan detail UKM -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <!-- Menampilkan judul halaman -->
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div> <!-- Tempat untuk tombol atau tools tambahan -->
        </div>

        <div class="card-body">
            <!-- Mengecek apakah data UKM kosong -->
            @empty($ukm)
                <!-- Menampilkan pesan kesalahan jika data tidak ditemukan -->
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <!-- Menampilkan data detail UKM dalam bentuk tabel -->
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $ukm->ukm_id }}</td>
                    </tr>
                    <tr>
                        <th>Nama UKM</th>
                        <td>{{ $ukm->nama }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $ukm->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Ketua Umum</th>
                        <td>{{ $ukm->ketua_umum }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Berdiri</th>
                        <td>{{ $ukm->tahun_berdiri }}</td>
                    </tr>
                </table>
            @endempty

            <!-- Tombol kembali ke halaman daftar UKM -->
            <a href="{{ url('ukm') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        </div>
    </div>

@endsection <!-- Akhir dari section konten -->

@push('css') <!-- Section untuk menambahkan CSS tambahan jika diperlukan -->
@endpush

@push('js') <!-- Section untuk menambahkan JavaScript tambahan jika diperlukan -->
@endpush