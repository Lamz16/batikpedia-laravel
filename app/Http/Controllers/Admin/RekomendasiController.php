<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link' => 'nullable|string',
        ]);

        $file = $request->file('image');
        $originalExt = strtolower($file->getClientOriginalExtension());

        $filename = time() . '.webp';
        $destination = public_path('uploads/rekomendasi/' . $filename);

        if (!file_exists(public_path('uploads/rekomendasi'))) {
            mkdir(public_path('uploads/rekomendasi'), 0777, true);
        }

        if (in_array($originalExt, ['jpg', 'jpeg'])) {
            $image = imagecreatefromjpeg($file->getPathname());
        } elseif ($originalExt === 'png') {
            $image = imagecreatefrompng($file->getPathname());

            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);
        } else {
            return back()->with('error', 'Format gambar tidak di dukung!');
        }
        imagewebp($image, $destination, 70);
        imagedestroy($image);

        Rekomendasi::create([
            'image' =>'uploads/rekomendasi/'.$filename,
            'link' => $request->link,
        ]);
        return redirect()->back()->with('success', 'Rekomendasi berhasil ditambahkan');
    }

}
