<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use Alert;


class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspirasi = Aspirasi::latest()->paginate(10);
        return view('aspirasi.index', compact('aspirasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aspirasi.create');
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
            // 'status' => 'required',
            'id_kategori' => 'required',
            'feedback' => 'required',
        ]);

        Aspirasi::create([
            // 'status' => $request->get('status'),
            'id_kategori' => $request->get('id_kategori'),
            'feedback' => $request->get('feedback'),
        ]);

        return redirect()->route('aspirasi.index')->with('message', 'Data Aspirasi berhasil ditambahkan');
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
    public function edit($id_aspirasi)
    {
        $aspirasi = Aspirasi::find($id_aspirasi);
        return view('aspirasi.edit', compact('aspirasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_aspirasi)
    {
        $aspirasi = Aspirasi::find($id_aspirasi);
            if($aspirasi->status == "menunggu"){
                $aspirasi->status = "proses";
                // $aspirasi->feedback = "👍";
                Alert::success('Success', 'Sedang Dikerjakan');
                $aspirasi->save();
                return redirect()->back();
            }
            else{
                $aspirasi->status = "selesai";
                // $aspirasi->feedback = "👍";
                Alert::success('Success', 'Sudah Dikerjakan');
                $aspirasi->save();
                return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_aspirasi)
    {
        $aspirasi = Aspirasi::find($id_aspirasi);
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('message', 'Data Aspirasi berhasil dihapus');
    }

    public function search(Request $request)
    {
        $aspirasi = $request->search;
        $aspirasi = Aspirasi::where('id_pelaporan', 'like', "%" . $aspirasi . "%")->paginate(20);
        return view('aspirasi.index', compact('aspirasi'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
