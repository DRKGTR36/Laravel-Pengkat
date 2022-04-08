<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use Illuminate\Support\Facades\Auth;
use Alert;

class InputAspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputaspirasi = InputAspirasi::get();
        return view('inputaspirasi.index', compact('inputaspirasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inputaspirasi.create');
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
            'id_kategori' => 'required',
            'feedback' => 'required',
            'nik' => 'required',
            // 'id_kategori' => 'required',
            'lokasi' => 'required',
            'ket' => 'required',
        ]);

        Aspirasi::create([
            // 'status' => $request->get('status'),
            'id_kategori' => $request->get('id_kategori'),
            'feedback' => $request->get('feedback'),
        ]);

        InputAspirasi::create([
            'nik' => $request->get('nik'),
            'id_kategori' => $request->get('id_kategori'),
            'lokasi' => $request->get('lokasi'),
            'ket' => $request->get('ket'),
        ]);

        $idp = InputAspirasi::value('id_pelaporan');

        Alert::success('Berhasil','Laporan Anda telah Dikirim', 3000);
        // Alert::success('Berhasil','Laporan Anda telah Dikirim, Kode Laporan Anda : ' . $id_pelaporan);

        return redirect()->back()->with('message', 'Data Aspirasi berhasil ditambahkan', );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pelaporan)
    {
        $inputaspirasi = InputAspirasi::find($id_pelaporan);
        return view('inputaspirasi.edit', compact('inputaspirasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelaporan)
    {
        $this->validate($request, [
            'nik' => 'required',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'ket' => 'required',
        ]);

        $inputaspirasi = InputAspirasi::find($id_pelaporan);
        $inputaspirasi->nik = $request->get('nik');
        $inputaspirasi->id_kategori = $request->get('id_kategori');
        $inputaspirasi->lokasi = $request->get('lokasi');
        $inputaspirasi->ket = $request->get('ket');
        $inputaspirasi->save();

        return redirect()->route('inputaspirasi.index')->with('message', 'Data Aspirasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelaporan)
    {
        $inputaspirasi = InputAspirasi::find($id_pelaporan);
        $inputaspirasi->delete();

        return redirect()->route('inputaspirasi.index')->with('message', 'Data Aspirasi berhasil dihapus');
    }

    public function search(Request $request)
    {
        $inputaspirasi = $request->search;
        $inputaspirasi = InputAspirasi::where('id_pelaporan', 'like', "%" . $inputaspirasi . "%")->paginate(20);
        return view('inputaspirasi.index', compact('inputaspirasi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
