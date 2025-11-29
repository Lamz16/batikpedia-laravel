<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class katalog_batik extends Model
{
    protected $primaryKey = 'id_katalog_batik';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'provinsi_id',
        'nama_batik',
        'detail_batik',
        'sejarah_batik',
        'penggunaan',
        'makna',
        'img_batik',
        'lat',
        'lon',
        'jenis_batik'
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

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id_provinsi');
    }


}
