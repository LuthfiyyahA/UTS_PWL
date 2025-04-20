@extends('layouts.template') <!-- Meng-extend layout utama -->

@section('content') <!-- Mulai section konten utama -->

    <!-- Kartu tampilan utama -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <!-- Judul halaman dari variabel $page -->
            <h3 class="card-title">{{ $page->title }}</h3>

            <!-- Tombol untuk menambah data UKM -->
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('ukm/create') }}">Tambah UKM</a>
            </div>
        </div>

        <div class="card-body">
            <!-- Form filter nama UKM -->
            <div class="form-group row">
                <label class="col-2 col-form-label">Filter:</label>
                <div class="col-4">
                    <!-- Dropdown filter nama UKM -->
                    <select class="form-control" id="nama" name="nama">
                        <option value="">-- Semua --</option>
                        @foreach ($ukm as $item)
                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Filter berdasarkan Nama UKM</small>
                </div>
            </div>

            <!-- Tabel data UKM -->
            <table class="table table-bordered table-striped table-hover table-sm" id="table_ukm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama UKM</th>
                        <th>Ketua Umum</th>
                        <th>Tahun Berdiri</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection <!-- Akhir section content -->

@push('css') <!-- Section untuk menambahkan CSS tambahan jika diperlukan -->
@endpush

@push('js') <!-- Section untuk menambahkan JavaScript -->
    <!-- Plugin SweetAlert2 untuk notifikasi -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable dengan server-side processing
            var dataUser = $('#table_ukm').DataTable({
                serverSide: true, // Data diolah di server
                processing: true, // Menampilkan animasi loading
                ajax: {
                    "url": "{{ url('ukm/list') }}", // URL untuk fetch data
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d){
                        d._token = "{{ csrf_token() }}"; // Token CSRF untuk keamanan
                        d.nama = $("#nama").val(); // Kirim data filter nama
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex", // Index baris (otomatis)
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "nama", // Kolom Nama UKM
                        className: "",
                        orderable: true,
                        searchable: true
                    },{
                        data: "ketua_umum", // Kolom Ketua Umum
                        className: "",
                        orderable: false,
                        searchable: false
                    },{
                        data: "tahun_berdiri", // Kolom Tahun Berdiri
                        className: "",
                        orderable: false,
                        searchable: false
                    },{
                        data: "aksi", // Kolom Aksi (edit/hapus)
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Reload tabel saat filter nama diganti
            $("#nama").on("change", function() {
                dataUser.ajax.reload();
            });
        });

        // Jika ada session success, tampilkan notifikasi berhasil
        @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Data berhasil diperbarui!',
            text: '{{ session('success') }}',
            showConfirmButton: true
        });
        @endif
    </script>
@endpush