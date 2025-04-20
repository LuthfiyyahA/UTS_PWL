<!-- Bagian header konten yang menampilkan judul halaman dan breadcrumb -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      
      <!-- Kolom kiri: Menampilkan judul halaman dari variabel breadcrumb -->
      <div class="col-sm-6">
        <h1>{{ $breadcrumb->title }}</h1>
      </div>

      <!-- Kolom kanan: Menampilkan breadcrumb navigasi -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          @foreach ($breadcrumb->list as $key => $value)
            @if($key == count($breadcrumb->list) - 1)
              <!-- Item terakhir ditampilkan sebagai aktif -->
              <li class="breadcrumb-item active">{{ $value }}</li>
            @else
              <!-- Item breadcrumb biasa (tidak aktif) -->
              <li class="breadcrumb-item">{{ $value }}</li>
            @endif
          @endforeach
        </ol>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>