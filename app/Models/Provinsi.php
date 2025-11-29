<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_provinsi';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama_provinsi', 'img_provinsi', 'detail_provinsi', ];

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

    public function katalogBatik()
    {
        return $this->hasMany(katalog_batik::class, 'provinsi_id', 'id_provinsi');
    }

    public function wisata()
    {
        return $this->hasMany(Wisata::class, 'provinsi_id', 'id_provinsi');
    }


}
