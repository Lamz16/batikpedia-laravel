<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Kursus_membatik;
use Illuminate\Http\Request;
use function formatRupiah;

class KursusMembatikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursus = Kursus_membatik::all();
        if ($kursus->isEmpty()) {
            return ApiResponse::error(404, 'Course not found');
        }

        $kursus->each(function ($item){
           $item->image = url($item->image);
        });

        return ApiResponse::success($kursus, 'Success get data course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKursus' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'urlKursus' => 'required|string',
        ]);

        $image = $request->file('image');
        $filename = time() .'_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/kursus'), $filename);

        $kursus = Kursus_membatik::create([
            'namaKursus' => $request->namaKursus,
                'image' => 'uploads/kursus/' .$filename,
                'harga' => formatRupiah($request->harga),
                'deskripsi' => $request->deskripsi,
                'urlKursus' => $request->urlKursus,
            ]
        );

        $kursus->image = url($kursus->image);

        return ApiResponse::success($kursus, 'Success add data kursus');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $kursus = Kursus_membatik::find($id);
        if(!$kursus){
            return ApiResponse::error(404, 'Course not found');
        }
        $kursus->image = url($kursus->image);
        return ApiResponse::success($kursus, 'Success get data course');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateKursus(Request $request, int $id)
    {
        $kursus = Kursus_membatik::find($id);
        if(!$kursus){
            return ApiResponse::error(404, 'Course not found');
        }

        $request->validate([
            'namaKursus' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'urlKursus' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $kursus->getOriginal('image');

            $image = $request->file('image');
            $fileName = time() .'_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/kursus'), $fileName);

            $oldImageFullPath = public_path($oldImage);

            if ($oldImage && file_exists($oldImageFullPath)) {
                unlink($oldImageFullPath);
            }

            $kursus->image = 'uploads/kursus/' .$fileName;

        }
        $kursus->namaKursus = $request->input('namaKursus', $kursus->namaKursus);
        $kursus->harga = formatRupiah($request->input('harga', $kursus->harga));
        $kursus->deskripsi = $request->input('deskripsi', $kursus->deskripsi);
        $kursus->urlKursus = $request->input('urlKursus', $kursus->urlKursus);
        $kursus->save();

        $kursus->image = url($kursus->image);

        return ApiResponse::success($kursus, 'Success update data kursus');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $kursus = Kursus_membatik::find($id);
        if(!$kursus){
            return ApiResponse::error(404, 'Course not found');
        }

        if($kursus->image && file_exists(public_path($kursus->image))){
            unlink(public_path($kursus->image));
        }

        $kursus->delete();
        return ApiResponse::success($kursus, 'Success delete data kursus');
    }
}
