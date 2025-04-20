@extends('layouts.template') <!-- Meng-extend template utama -->

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3> <!-- Menampilkan judul halaman -->
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <!-- Menampilkan pesan error jika ada -->
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Menampilkan pesan jika data UKM tidak ditemukan -->
            @empty($ukm)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('ukm') }}" class="btn btn-sm btn-default mt-2">Kembali</a> <!-- Tombol kembali -->
            @else
                <!-- Form untuk mengupdate data UKM -->
                <form action="{{ url('ukm/' . $ukm->ukm_id) }}" method="POST" class="form-horizontal">
                    @csrf <!-- Token keamanan form -->
                    {!! method_field('PUT') !!} <!-- Method spoofing agar form bisa mengirimkan PUT -->

                    <!-- Input Nama UKM -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Nama UKM</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $ukm->nama) }}" required>
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small> <!-- Menampilkan error validasi -->
                            @enderror
                        </div>
                    </div>

                    <!-- Input Deskripsi UKM -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Deskripsi UKM</label>
                        <div class="col-11">
                            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $ukm->deskripsi }}</textarea>
                            @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small> <!-- Menampilkan error validasi -->
                            @enderror
                        </div>
                    </div>

                    <!-- Input Ketua Umum -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Ketua Umum</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="ketua_umum" name="ketua_umum" value="{{ old('ketua_umum', $ukm->ketua_umum) }}" required>
                            @error('ketua_umum')
                                <small class="form-text text-danger">{{ $message }}</small> <!-- Menampilkan error validasi -->
                            @enderror
                        </div>
                    </div>

                    <!-- Input Tahun Berdiri -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Tahun Berdiri</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri', $ukm->tahun_berdiri) }}" required>
                            @error('tahun_berdiri')
                                <small class="form-text text-danger">{{ $message }}</small> <!-- Menampilkan error validasi -->
                            @enderror
                        </div>
                    </div>

                    <!-- Tombol simpan dan kembali -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button> <!-- Tombol simpan -->
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('ukm') }}">Kembali</a> <!-- Tombol kembali -->
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection

@push('css') <!-- Section untuk custom CSS jika diperlukan -->
@endpush

@push('js') <!-- Section untuk custom JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if ($errors->any()) // Jika terdapat error validasi, tampilkan melalui SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Data tidak lengkap!',
            html: `{!! implode('<br>', $errors->all()) !!}`
        });
    @endif
</script>
@endpush
