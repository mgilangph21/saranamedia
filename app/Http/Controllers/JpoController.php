<?php

namespace App\Http\Controllers;

use App\Models\Jpo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class JpoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Jpo::all(); 

        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json');
        $kota = $response->json();
        
        return view('admin.jpo.index', compact([
            'data',
            'kota'
        ]));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if ($request->hasFile('gambar')){
            $filename = $request->file('gambar')->store('gbr', 'public'); // disimpan di folder gbr di dalam /storage/app/public
        }

        $data = new Jpo([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'detil' => $request->keteranganJpo,
            'status' => $request->status,
            'gambar' => $filename
        ]);
        $data->save();

        return back()->with('success', 'Data Jpo baru berhasil ditambahkan');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Jpo::findOrFail($id);
        $response = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/35.json');
        $kota = $response->json();

        return view('admin.jpo.edit', compact([
            'data',
            'kota'
        ]));
    }


    public function update(Request $request)
    {
        $data = Jpo::findOrFail($request->uid);        
        if ($request->hasFile('ugambar')){
            if(Storage::exists('public/' . $data->gambar)){ 
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

        return back()->with('success', 'Data Jpo ' . $request->unama . ' berhasil diperbarui.');
    }


    public function destroy(Request $request)
    {
        $data = Jpo::findOrFail($request->haid);

        if(Storage::exists('public/' . $data->gambar)){
            Storage::delete('public/' . $data->gambar);
            $name = $data->nama;
            $data->delete();
            return back()->with('warning','Data Jpo '. $name . ' berhasil dihapus.');
        } else {
            return back()->with('error', 'Tidak dapat hapus data Jpo, file gambar tidak tersedia!');
        }   
    }
}