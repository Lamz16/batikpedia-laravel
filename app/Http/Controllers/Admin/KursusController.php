<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kursus_membatik;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_kursus' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'url_kursus' => 'required|string',
        ]);

        $file = $request->file('image');
        $originalExt = strtolower($file->getClientOriginalExtension());

        $filename = time(). '.webp';
        $destination = public_path('uploads/kursus/' . $filename);

        if (!file_exists(public_path('uploads/kursus'))){
            mkdir(public_path('uploads/kursus'), 0777,true);
        }

        if (in_array($originalExt,['jpg', 'jpeg'])) {
            $image = imagecreatefromjpeg($file->getPathname());
        }elseif ($originalExt === 'png'){
            $image = imagecreatefrompng($file->getPathname());

            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }else{
            return back()->with('error', 'Format gambar tidak didukung!');
        }

        imagewebp($image, $destination, 70);
        imagedestroy($image);

        Kursus_membatik::create([
            'nama_kursus' => $request->nama_kursus,
            'image' => 'uploads/kursus/'.$filename,
            'harga' =>formatRupiah($request->harga),
            'deskripsi' => $request->deskripsi,
            'url_kursus' => $request->url_kursus,
        ]);

        return redirect()->back()->with('success', 'Kursus berhasil ditambahkan');

    }
}
