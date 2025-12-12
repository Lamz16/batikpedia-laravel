<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video_batik;
use Illuminate\Http\Request;

class VideoBatikController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul_video' => 'required|string|max:255',
            'img_video' => 'required|string|max:255',
            'url_video' => 'required|string|max:255',
        ]);

        Video_batik::create($request->all());
        return redirect()->back()->with('success', 'Berhasil menambahkan data video batik');
    }
}
