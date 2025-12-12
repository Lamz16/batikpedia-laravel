<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
class ProvinsiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_provinsi'   => 'required|max:255|unique:provinsis,nama_provinsi',
            'img_provinsi'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'detail_provinsi' => 'nullable|string',
        ]);

        $file = $request->file('img_provinsi');
        $originalExt = strtolower($file->getClientOriginalExtension());

        // Nama file baru (webp)
        $filename = time() . '.webp';
        $destination = public_path('uploads/provinsi/' . $filename);

        // Pastikan folder ada
        if (!file_exists(public_path('uploads/provinsi'))) {
            mkdir(public_path('uploads/provinsi'), 0777, true);
        }

        // Convert ke WebP
        if (in_array($originalExt, ['jpg', 'jpeg'])) {
            $image = imagecreatefromjpeg($file->getPathname());
        } elseif ($originalExt === 'png') {
            $image = imagecreatefrompng($file->getPathname());
            // fix background hitam
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        }else {
            // <-- ini penting untuk mencegah undefined $image
            return back()->with('error', 'Format gambar tidak didukung!');
        }

// simpan WebP terkompresi
        imagewebp($image, $destination, 70);
        imagedestroy($image);

        Provinsi::create([
            'nama_provinsi'   => $request->nama_provinsi,
            'img_provinsi'    => 'uploads/provinsi/'.$filename,
            'detail_provinsi' => $request->detail_provinsi,
        ]);

        return redirect()->back()->with('success', 'Provinsi berhasil ditambah');

    }

}
