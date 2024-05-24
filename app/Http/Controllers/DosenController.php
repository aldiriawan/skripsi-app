<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $program_studi = $request->query('program_studi');
        $dosen_id = $request->query('dosen_id'); // Mendapatkan ID dosen yang dipilih

        $query = Dosen::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        if ($program_studi) {
            $query->where('program_studi', $program_studi);
        }

        $dosen = $query->get();
        $selectedDosen = null;
        $penunjang = collect();

        if ($dosen_id) {
            $selectedDosen = Dosen::find($dosen_id);
            if ($selectedDosen) {
                $penunjang = SuratTugas::where('dosen_id', $dosen_id)
                    ->where('jenis_id', 2)
                    ->get();
            }
        }

        $selectedDosenId = $request->input('dosen_id');

        // Mengambil jumlah akreditasi untuk setiap kategori (misal: S1, S2, dst.) berdasarkan dosen yang dipilih
        $jumlahAkreditasiPerKategori = SuratTugas::where('dosen_id', $selectedDosenId)
            ->select('akreditasi', DB::raw('COUNT(*) as jumlah_akreditasi'))
            ->groupBy('akreditasi')
            ->get();

        // Mengambil jumlah publikasi Nasional
        $jumlahPublikasiNasional = SuratTugas::where('dosen_id', $selectedDosenId)
            ->where('publikasi_id', 1)
            ->count();

        // Mengambil jumlah publikasi internasional
        $jumlahPublikasiInternasional = SuratTugas::where('dosen_id', $selectedDosenId)
            ->where('publikasi_id', 2)
            ->count();

        // Mengambil jumlah HKI
        $jumlahHKI = SuratTugas::where('dosen_id', $selectedDosenId)
            ->where('publikasi_id', 4)
            ->count();

        return view('dosen.index', [
            'title' => 'Data Dosen',
            'dosen' => $dosen,
            'selectedDosen' => $selectedDosen,
            'penunjang' => $penunjang,
            'jumlahAkreditasiPerKategori' => $jumlahAkreditasiPerKategori,
            'jumlahPublikasiNasional' => $jumlahPublikasiNasional,
            'jumlahPublikasiInternasional' => $jumlahPublikasiInternasional,
            'jumlahHKI' => $jumlahHKI,
            'selectedDosenId' => $selectedDosenId,
        ]);
    }

    // ...methods lainnya tetap...
}
