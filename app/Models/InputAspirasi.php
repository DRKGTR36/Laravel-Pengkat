<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class InputAspirasi extends Model
{
    use HasFactory;

    protected $table = 'input_aspirasi';

    protected $primaryKey = 'id_pelaporan';

    protected $fillable = ['id_pelaporan', 'nik', 'id_kategori', 'lokasi', 'ket'];

    public function Penduduk(){
        return $this->belongsTo(Penduduk::class);
    }

    public function Aspirasi(){
        return $this->belongsTo(Aspirasi::class, 'id_kategori', 'id_kategori');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
