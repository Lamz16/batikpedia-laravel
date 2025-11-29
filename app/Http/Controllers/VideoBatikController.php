<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Video_batik;
use Illuminate\Http\Request;

class VideoBatikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video_batik = Video_batik::all();
        if ($video_batik->isEmpty()) {
            return ApiResponse::error(404, "Data not found");
        }
        return ApiResponse::success($video_batik, "Success get data");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_video' => 'required|string|max:255',
            'img_video' => 'required|string|max:255',
            'url_video' => 'required|string|max:255',
        ]);

        $video_batik = Video_batik::create($request->all());
        return ApiResponse::success($video_batik, "Success save data");

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $videoBatik = Video_batik::find($id);
        if (!$videoBatik) {
            return ApiResponse::error(404, "Data not found");
        }
        return ApiResponse::success($videoBatik, "Success get data");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {


        $videoBatik = Video_batik::find($id);
        if (!$videoBatik) {
            return ApiResponse::error("Video batik not found");
        }
        $request->validate([
            'judul_video' => 'required|string|max:255',
            'img_video' => 'required|string|max:255',
            'url_video' => 'required|string|max:255',
        ]);
        $videoBatik->update($request->all());
        return ApiResponse::success($videoBatik, "Success update data");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $videoBatik = Video_batik::find($id);
        if (!$videoBatik) {
            return ApiResponse::error("Video batik not found");
        }
        $videoBatik->delete();
        return ApiResponse::success($videoBatik, "Success delete data");
    }
}
