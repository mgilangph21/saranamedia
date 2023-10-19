<?php

namespace App\Http\Controllers;

use App\Models\Led;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class LedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Led::cursorPaginate(10);
        $count = count(Led::all());

        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json');
        $kota = $response->json();

        return view('admin.led.index', compact([
            'data',
            'kota',
            'count'
        ]));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $filename = $request->file('gambar')->store('gbr', 'public'); // disimpan di folder gbr di dalam /storage/app/public
        }

        $data = new Led([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'detil' => $request->keteranganLed,
            'status' => $request->status,
            'gambar' => $filename
        ]);
        $data->save();

        return back()->with('success', 'Data Led baru berhasil ditambahkan');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Led::findOrFail($id);
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json');
        $kota = $response->json();

        return view('admin.led.edit', compact([
            'data',
            'kota'
        ]));
    }


    public function update(Request $request)
    {
        $data = Led::findOrFail($request->uid);
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
            'detil' => $request->uketerangan,
            'status' => $request->ustatus,
            'gambar' => $filename
        ]);

        return back()->with('success', 'Data Led ' . $request->unama . ' berhasil diperbarui.');
    }


    public function destroy(Request $request)
    {
        $data = Led::findOrFail($request->haid);

        if (Storage::exists('public/' . $data->gambar)) {
            Storage::delete('public/' . $data->gambar);
            $name = $data->nama;
            $data->delete();
            return back()->with('warning', 'Data Led ' . $name . ' berhasil dihapus.');
        } else {
            return back()->with('error', 'Tidak dapat hapus data Led, file gambar tidak tersedia!');
        }
    }
}
