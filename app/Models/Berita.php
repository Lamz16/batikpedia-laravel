<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
  protected $primaryKey = 'id_berita';

  protected $fillable=[
      'nama_berita',
      'tgl_berita',
      'lokasi_berita',
      'url_berita',
      'img_berita',
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
