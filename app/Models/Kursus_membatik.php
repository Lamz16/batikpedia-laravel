<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Kursus_membatik extends Model
{
    protected $primaryKey = 'idKursus';

    protected $fillable= [
      'namaKursus',
        'image',
        'harga',
        'deskripsi',
        'urlKursus'
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
