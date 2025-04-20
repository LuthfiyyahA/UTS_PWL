@extends('layouts.template') <!-- Menggunakan layout utama dari folder layouts/template.blade.php -->

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3> <!-- Menampilkan judul halaman dari variabel $page -->
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form action="{{ url('ukm') }}" method="POST"> <!-- Form untuk menyimpan data UKM baru -->
                @csrf <!-- Token CSRF untuk keamanan form -->

                <!-- Input untuk Nama UKM -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama UKM</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama') <!-- Menampilkan pesan error jika validasi gagal -->
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Input untuk Deskripsi UKM -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Deskripsi UKM</label>
                    <div class="col-11">
                        <textarea name="deskripsi" id="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <!-- Menampilkan pesan error jika validasi gagal -->
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Input untuk Ketua Umum -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Ketua Umum</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="ketua_umum" name="ketua_umum" value="{{ old('ketua_umum') }}">
                        @error('ketua_umum') <!-- Menampilkan pesan error jika validasi gagal -->
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Input untuk Tahun Berdiri -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tahun Berdiri</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri') }}">
                        @error('tahun_berdiri') <!-- Menampilkan pesan error jika validasi gagal -->
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Simpan dan Kembali -->
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> <!-- Tombol untuk menyimpan data -->
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('ukm') }}">Kembali</a> <!-- Tombol kembali ke halaman UKM -->
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css') <!-- Section untuk menambahkan CSS tambahan jika diperlukan -->
@endpush

@push('js') <!-- Section untuk menambahkan JavaScript tambahan -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if ($errors->any()) //Jika ada error validasi, tampilkan SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Data tidak lengkap!',
            html: `{!! implode('<br>', $errors->all()) !!}`
        });
    @endif
</script>
@endpush
