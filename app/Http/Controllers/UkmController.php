<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use App\Models\UkmModel;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    // Menampilkan halaman daftar UKM
    public function index()
    {
        // Data breadcrumb untuk navigasi halaman
        $breadcrumb = (object) [
            'title' => 'Daftar UKM',
            'list' => ['Home', 'UKM']
        ];

        // Judul halaman
        $page = (object) [
            'title' => 'Daftar UKM yang terdaftar dalam sistem'
        ];

        $activeMenu = 'ukm'; // Menu aktif untuk highlight di sidebar
        $ukm = UkmModel::all(); // Mengambil semua data UKM

        // Menampilkan view dengan data yang telah disiapkan
        return view('ukm.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ukm' => $ukm, 'activeMenu' => $activeMenu]);
    }

    // Mengembalikan data UKM dalam format DataTables (digunakan oleh AJAX)
    public function list(Request $request)
    {
        // Ambil kolom tertentu dari tabel UKM
        $ukm = UkmModel::select('ukm_id', 'nama', 'ketua_umum', 'tahun_berdiri');

        // Filter data jika parameter nama dikirimkan
        if ($request->nama) {
            $ukm->where('nama', $request->nama);
        }

        // Format data untuk DataTables termasuk kolom aksi (detail, edit, hapus)
        return datatables()->of($ukm)
            ->addIndexColumn()
            ->addColumn('aksi', function ($ukm) {
                $btn = '<a href="' . url('/ukm/' . $ukm->ukm_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/ukm/' . $ukm->ukm_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/ukm/' . $ukm->ukm_id) . '">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\')">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // Supaya HTML pada kolom 'aksi' tidak di-escape
            ->make(true);
    }

    // Menampilkan halaman form tambah UKM
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah UKM',
            'list' => ['Home', 'UKM', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah UKM baru'
        ];

        $activeMenu = 'ukm';

        // Tampilkan halaman form tambah UKM
        return view('ukm.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data UKM baru ke database
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:100|unique:ukm,nama',
            'deskripsi' => 'required|string',
            'ketua_umum' => 'required|string|max:255',
            'tahun_berdiri' => 'required|string|max:5'
        ]);

        // Simpan data ke database
        UkmModel::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ketua_umum' => $request->ketua_umum,
            'tahun_berdiri' => $request->tahun_berdiri
        ]);

        // Redirect ke halaman daftar UKM dengan pesan sukses
        return redirect()->route('ukm.index')->with('success', 'Berhasil menambahkan data UKM baru');
    }

    // Menampilkan detail dari sebuah UKM
    public function show(string $id)
    {
        $ukm = UkmModel::find($id); // Ambil data UKM berdasarkan ID

        $breadcrumb = (object) [
            'title' => 'Detail UKM',
            'list' => ['Home', 'UKM', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail UKM'
        ];

        $activeMenu = 'ukm';

        // Tampilkan halaman detail UKM
        return view('ukm.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ukm' => $ukm, 'activeMenu' => $activeMenu]);
    }

    // Menampilkan form edit data UKM
    public function edit(string $id)
    {
        $ukm = UkmModel::find($id); // Ambil data UKM berdasarkan ID

        $breadcrumb = (object) [
            'title' => 'Edit UKM',
            'list' => ['Home', 'UKM', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit UKM'
        ];

        $activeMenu = 'ukm';

        // Tampilkan halaman form edit
        return view('ukm.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ukm' => $ukm, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data UKM ke database
    public function update(Request $request, string $id)
    {
        // Validasi input data
        $request->validate([
            'nama' => 'required|string|max:100|unique:ukm,nama,' . $id . ',ukm_id',
            'deskripsi' => 'required|string',
            'ketua_umum' => 'required|string|max:255',
            'tahun_berdiri' => 'required|string|max:5'
        ]);

        // Update data ke database
        UkmModel::find($id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ketua_umum' => $request->ketua_umum,
            'tahun_berdiri' => $request->tahun_berdiri
        ]);

        // Jika request AJAX, kembalikan respon JSON
        if ($request->ajax()) {
            return response()->json(['success' => 'Data UKM berhasil diubah']);
        }

        // Redirect ke halaman daftar UKM dengan pesan sukses
        return redirect()->route('ukm.index')->with('success', 'Data UKM berhasil diubah');
    }

    // Menghapus data UKM dari database
    public function destroy(string $id)
    {
        $check = UkmModel::find($id); // Cek apakah data UKM ditemukan
        if (!$check) {
            return redirect()->route('ukm.index')->with('error', 'Data UKM tidak ditemukan');
        }

        try {
            // Hapus data jika tidak ada relasi yang menghalangi
            UkmModel::destroy($id);
            return redirect()->route('ukm.index')->with('success', 'Data UKM berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani error jika penghapusan gagal karena constraint
            return redirect()->route('ukm.index')->with('error', 'Data UKM tidak bisa dihapus karena masih terdapat data yang terkait dengan data ini');
        }
    }
}