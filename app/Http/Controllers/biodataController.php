<?php

namespace App\Http\Controllers;

use App\Biodata;
use Illuminate\Http\Request;

class biodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::get();

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'Biodata',
            'data' => $biodata
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'hobi' => 'required',
            'foto' => 'required',
        ]);

        $biodata = Biodata::create([
            'nama' => $request->input('nama'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'hobi' => $request->input('hobi'),
            'foto' => $request->input('foto'),
        ]);

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'Biodata dibuat',
            'data' => $biodata
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit(Biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Request $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'hobi' => 'required',
            'foto' => 'required',
        ]);

        $biodata = Biodata::findOrFail($id);

        $biodata->nama = $request->input('nama');
        $biodata->no_hp = $request->input('no_hp');
        $biodata->alamat = $request->input('alamat');
        $biodata->hobi = $request->input('hobi');
        $biodata->foto = $request->input('foto');

        $biodata->update();

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'data updated',
            'data' => $biodata
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();

        return response()->json([
            'code' => 'SUCCESS',
            'message' => 'berhasil dihapus',
        ], 200);
    }
}
