<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class WisataController extends Controller
{
    public function  create()
    {
        $provinsi = Provinsi::all();
        return view('admin.forms.wisata.add_wisata', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi_id' => 'required|exists:provinsis,id_provinsi',
            'nama_wisata' => [
                'required',
                'string',
                'max:255',
                Rule::unique('wisatas', 'nama_wisata')->where(fn ($query) => $query->whereRaw('LOWER(nama_wisata) = LOWER(?)', [$request->nama_wisata]))
            ],
            'detail_wisata' => 'nullable|string',
            'lat' => 'nullable',
            'lon' => 'nullable',
            'img_wisata' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'wilayah' => 'nullable|string|max:255',
        ]);

        $file = $request->file('img_wisata');
        $originalExt = strtolower($file->getClientOriginalExtension());

        $filename = time().'.webp';
        $destination = public_path('uploads/wisata/'. $filename);

        if (!file_exists(public_path('uploads/wisata'))){
            mkdir(public_path('uploads/wisata'), 0777, true);
        }

        if (in_array($originalExt, ['jpg', 'jpeg'])){
            $image = imagecreatefromjpeg($file->getPathname());
        }elseif ($originalExt === 'png'){
            $image = imagecreatefrompng($file->getPathname());

            imagepalettetotruecolor($image);
            imagealphablending($image,true);
            imagesavealpha($image, true);
        }else{
            return back()->with('error', 'Format gambar tidak didukung!');
        }

        imagewebp($image, $destination, 70);
        imagedestroy($image);

        Wisata::create([
            'provinsi_id' => $request->provinsi_id,
            'nama_wisata' => $request->nama_wisata,
            'detail_wisata' => $request->detail_wisata,
            'lat'=> $request->lat,
            'lon' => $request->lon,
            'img_wisata' => 'uploads/wisata/'.$filename,
            'wilayah' => $request->wilayah
        ]);

        return redirect()->back()->with('success', 'Data wisata berhasil ditambahkan');
    }
}
