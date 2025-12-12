<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_berita' =>['required','string','max:255'],
            'tgl_berita' =>['required','string','max:255'],
            'lokasi_berita' =>['required','string','max:255'],
            'url_berita' =>['required','string'],
            'img_berita' =>['required','string'],
        ]);

        Berita::create($request->all());
        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }
}
