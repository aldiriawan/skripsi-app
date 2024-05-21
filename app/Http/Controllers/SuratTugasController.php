<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Imports\SuratTugasImport;
use Maatwebsite\Excel\Facades\Excel;

class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surattugas.index', [
            'title' => 'Data Surat Tugas',
            'surattugas' => SuratTugas::all(),
            'dosens' => Dosen::all()
        ]);
    }

    public function ImportExcelData(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new SuratTugasImport, $request->file('import_file'));

        return redirect()->back()->with('success', 'Import Sukses');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surattugas.create', [
            'title' => 'Buat Data Surat Tugas',
            'surattugas' => SuratTugas::all(),
            'dosens' => Dosen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'required',
            'dosen_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
            'bukti' => 'required',
            'jenis' => 'required',
            'tingkat' => 'required',
            'akreditasi' => 'required',
            'peran' => 'required',
            'publikasi' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        SuratTugas::create($validatedData);

        return redirect('/surattugas')->with('success', 'Data Surat baru sukses ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratTugas $suratTugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratTugas $suratTugas)
    {
        return view('surattugas.edit', [
            'title' => 'Edit Data Surat Tugas',
            'surattugas' => $suratTugas,
            'dosens' => Dosen::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratTugas $suratTugas)
    {
        $rules = [
            'dosen_id' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
            'bukti' => 'required',
            'jenis' => 'required',
            'tingkat' => 'required',
            'akreditasi' => 'required',
            'peran' => 'required',
            'publikasi' => 'required'
        ];

        if ($request->nomor != $suratTugas->nomor) {
            $rules['nomor'] = 'required|unique:surat_tugas';
        }

        $validatedData =  $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Dosen::where('id', $suratTugas->id)
            ->update($validatedData);

        return redirect('/surattugas')->with('success', 'Data Surat Tugas sudah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratTugas $suratTugas)
    {
        SuratTugas::destroy($suratTugas->id);
        return redirect('/surattugas')->with('success', 'Data  sudah terhapus!');
    }
}
