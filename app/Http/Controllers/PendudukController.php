<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = Penduduk::latest()->paginate(10);
        return view('penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|min:16|max:16',
            'alamat' => 'required',
        ]);

        Penduduk::create([
            'nik' => $request->get('nik'),
            'alamat' => $request->get('alamat'),
        ]);

        return redirect()->route('penduduk.index')->with('message', 'Data Penduduk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $penduduk = Penduduk::find($nik);
        return view('penduduk.detail', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $penduduk = Penduduk::find($nik);
        return view('penduduk.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $this->validate($request, [
            'nik' => 'required|min:16|max:16',
            'alamat' => 'required',
        ]);

        $penduduk = Penduduk::find($nik);
        $penduduk->nik = $request->get('nik');
        $penduduk->alamat = $request->get('alamat');
        $penduduk->save();

        return redirect()->route('penduduk.index')->with('message', 'Data Penduduk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $penduduk = Penduduk::find($nik);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('message', 'Data Masyarakat berhasil dihapus');
    }
}
