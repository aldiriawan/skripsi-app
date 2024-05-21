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

        return view('dosen.index', [
            'title' => 'Data Dosen',
            'dosen' => $dosen,
            'selectedDosen' => $selectedDosen,
            'penunjang' => $penunjang,
            'jumlahAkreditasiPerKategori' => $jumlahAkreditasiPerKategori,
            'selectedDosenId' => $selectedDosenId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create', [
            'title' => 'Buat Data Dosen',
            'dosen' => Dosen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'program_studi' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Dosen::create($validatedData);

        return redirect('/dosen')->with('success', 'Data Dosen baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        // $dosen = Dosen::find($dosen);
        return view('dosen.show', [
            'title' => 'Detail Data Dosen',
            // 'dosen' => $dosen,
            'dosen' => Dosen::find($dosen)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', [
            'title' => 'Edit Data Dosen',
            'dosen' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $rules = [
            'nama' => 'required|max:255',
            'program_studi' => 'required',
        ];


        $validatedData =  $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Dosen::where('id', $dosen->id)
            ->update($validatedData);

        return redirect('/dosen')->with('success', 'Data Dosen sudah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return redirect('/dosen')->with('success', 'Data Dosen sudah terhapus!');
    }
}
