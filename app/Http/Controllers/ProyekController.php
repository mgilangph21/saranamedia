<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Proyek::cursorPaginate(10);
        $count = count(Proyek::all());

        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json');
        $kota = $response->json();

        return view('admin.proyek.index', compact([
            'data',
            'kota',
            'count'
        ]));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->store('gbr', 'public'); // disimpan di folder gbr di dalam /storage/app/public
        }

        $data = new Proyek([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'gambar' => $filename
        ]);
        $data->save();

        return back()->with('success', 'Data Proyek baru berhasil ditambahkan');
    }

    public function destroy(Request $request)
    {
        $data = Proyek::findOrFail($request->haid);

        if (Storage::exists('public/' . $data->gambar)) {
            Storage::delete('public/' . $data->gambar);
            $name = $data->nama;
            $data->delete();
            return back()->with('warning', 'Data Proyek ' . $name . ' berhasil dihapus.');
        } else {
            return back()->with('error', 'Tidak dapat hapus data Proyek, file gambar tidak tersedia!');
        }
    }

    public function update(Request $request)
    {
        $data = Proyek::findOrFail($request->uid);
        if ($request->hasFile('ugambar')) {
            if (Storage::exists('public/' . $data->gambar)) {
                Storage::delete('public/' . $data->gambar); // hapus file gambar lama
            }
            // upload file gambar baru
            $filename = $request->file('ugambar')->store('gbr', 'public'); // disimpan di folder gbr di dalam /storage/app/public
        } else {
            $filename = $data->gambar;
        }

        $data->update([
            'nama' => $request->unama,
            'lokasi' => $request->lokasi,
            'gambar' => $filename
        ]);

        return back()->with('success', 'Data Led ' . $request->unama . ' berhasil diperbarui.');
    }
}
