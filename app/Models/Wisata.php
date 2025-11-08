<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $primaryKey = 'idWisata';

    protected $fillable =[
        'namaWisata',
        'detailWisata',
        'lat',
        'lon',
        'imgWisata',
        'wilayah',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function serializeDate(\DateTimeInterface $date)
    {
        return Carbon::instance($date)
            ->setTimezone('Asia/Jakarta')
            ->format('Y-m-d H:i:s');
    }

}
