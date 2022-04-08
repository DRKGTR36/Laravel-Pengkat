<?php

use Illuminate\Support\Facades\Auth;

// use App\Models\User;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;
use App\Models\Penduduk;
use App\Models\Kategori;

function totalInputAspirasi()
{
    return InputAspirasi::count();
}

function totalAspirasi()
{
    return Aspirasi::count();
}

function totalPenduduk()
{
    return Penduduk::count();
}

function totalKategori()
{
    return Kategori::count();
}
