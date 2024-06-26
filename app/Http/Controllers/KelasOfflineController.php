<?php

namespace App\Http\Controllers;

use App\Models\KelasOffline;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class KelasOfflineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelasOfflines = KelasOffline::latest()->get();
        $user = auth()->user();

        return view('kelas.bpp.index', compact('kelasOfflines', 'user'));
    }

    public function indexLanding() {
        $kelasOfflines = KelasOffline::all();

        return view('kelas.landing.index', compact('kelasOfflines'));
    }

    public function showKelasLanding(KelasOffline $kelasOffline) {

        return view('kelas.landing.show', compact('kelasOffline'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        return view('kelas.bpp.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'ringkasan' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg|dimensions:max_width=1920,max_height=1080',
            'tgl_pelaksanaan' => 'required|date',
            'jam_pelaksanaan' => 'required',
            'lokasi_pelaksanaan' => 'required',
        ]);

        if ($request->file('poster')) {
            $posterPelatihanFile = $request->file('poster');
            $posterPelatihanName = time() . '.' . $posterPelatihanFile->getClientOriginalExtension();
            $validatedData['poster'] = $posterPelatihanName;
            $posterPelatihanFile->storeAs('public/poster_kelass', $posterPelatihanName);
        }

        $validatedData['penanggung_jawab_id'] = $request->user()->id;

        KelasOffline::create($validatedData);

        return redirect()->route('bpp.kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KelasOffline $kelasOffline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelasOffline $kelasOffline)
    {
        $user = auth()->user();

        return view('kelas.bpp.edit', compact('kelasOffline', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelasOffline $kelasOffline)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'ringkasan' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg',
            'tgl_pelaksanaan' => 'required|date',
            'jam_pelaksanaan' => 'required',
            'lokasi_pelaksanaan' => 'required',
        ]);

        if ($request->file('poster')) {
            if ($request->oldImage) {
                Storage::delete('public/poster_kelass/' . $request->oldImage);
            }
            $posterPelatihanFile = $request->file('poster');
            $posterPelatihanName = time() . '.' . $posterPelatihanFile->getClientOriginalExtension();
            $validatedData['poster'] = $posterPelatihanName;
            $posterPelatihanFile->storeAs('public/poster_kelass', $posterPelatihanName);
        } else {
            $validatedData['poster'] = $request->oldImage;
        }

        $validatedData['penanggung_jawab_id'] = $request->user()->id;

        $kelasOffline->update($validatedData);

        return redirect()->route('bpp.kelas.index')->with('success', 'Kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelasOffline $kelasOffline)
    {
        $kelasOffline->delete();

        return redirect()->route('bpp.kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
