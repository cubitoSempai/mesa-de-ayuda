<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Areas::all();
        return view('areas.AreasConsultView', ['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.AreasCreateView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        Areas::create($request->except(['action', '_token']));
        return redirect()->route('areas.index');
    }

    /**
     * Show the form for searching the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_resource()
    {
        return view('areas.AreasShowFormView');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            'idArea' => 'required',
        ]);
        $area = Areas::find($request->idArea);
        if (!$area) {
            return Redirect::back()->withErrors(['notExist' => 'El id de area "' . $request->idArea . '" no existe']);
        }
        return view('areas.AreasShowView', ['area' => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idArea)
    {
        $area = Areas::find($idArea);
        return view('areas.AreasEditView', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idArea)
    {

        $this->validateForm($request);
        Areas::find($idArea)->update($request->except(['action', '_token']));

        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idArea)
    {
        Areas::destroy($idArea);
        return redirect()->route('areas.index');
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'nombreArea' => 'required',
            'fkRmple' => 'required',
        ]);
    }
}