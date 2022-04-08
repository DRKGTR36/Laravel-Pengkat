<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasi';

    protected $primaryKey = 'id_aspirasi';

    protected $fillable = ['id_aspirasi', 'status', 'id_kategori', 'feedback'];

    public function Kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function InputAspirasi(){
        return $this->hasMany(InputAspirasi::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
