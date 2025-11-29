<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Kursus_membatik extends Model
{
    protected $primaryKey = 'id_kursus';

    protected $fillable= [
      'nama_kursus',
        'image',
        'harga',
        'deskripsi',
        'url_kursus'
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
