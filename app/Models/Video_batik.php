<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Video_batik extends Model
{
    protected $primaryKey = 'id_video';
    protected $fillable =[
      'judul_video',
      'img_video',
      'url_video',
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
