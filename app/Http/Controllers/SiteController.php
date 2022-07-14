<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitios = Site::simplePaginate(30);
        return view('sites.index', compact('sitios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = request()->validate([
            'municipio' => 'required',
            'lugar' => 'required',
            'nombre' => 'required',
            'fotografia' => 'required',
            'descripcion' => 'required',
        ]);

        if (isset($validaciones)) {
            $sitio = new Site();
            $sitio->municipio = $request->municipio;
            $sitio->lugar = $request->lugar;
            $sitio->nombre = $request->nombre;
            $fotografia = $request->file('fotografia');
            $fotografia->move('img', $fotografia->getClientOriginalName());
            $sitio->fotografia = $fotografia->getClientOriginalName();
            $sitio->descripcion = $request->descripcion;

            $sitio->save();
            session()->flash('message', 'Sitio creado satisfactoriamente!!');
            return redirect()->route('sitio.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $sitio)
    {
        $services = 
        Service::join("sites", "services.sitio_id", "=", "sites.id")->where("sitio_id", $sitio->id)
        ->select("services.servicio", "services.precio")->get();

        return view('sites.show', compact('services', 'sitio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $sitio)
    {
        return view('sites.edit', compact('sitio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $sitio)
    {
        $validaciones = request()->validate([
            'municipio' => 'required',
            'lugar' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        if (isset($validaciones)) {

            $sitio->municipio = $request->municipio;
            $sitio->lugar = $request->lugar;
            $sitio->nombre = $request->nombre;
            $sitio->descripcion = $request->descripcion;

            if (isset($request->fotografia)) {
                $image_path = public_path() . '/img/' . $sitio->fotografia;
                unlink($image_path);
                $fotografia = $request->file('fotografia');
                $fotografia->move('img', $fotografia->getClientOriginalName());
                $sitio->fotografia = $fotografia->getClientOriginalName();
            } else {
                $sitio->fotografia = $sitio->fotografia;
            }

            $sitio->save();
        }

        session()->flash('update', 'Sitio actualizado satisfactoriamente');
        return redirect()->route('sitio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $sitio)
    {
        $image_path = public_path() . '/img/' . $sitio->fotografia;

        unlink($image_path);
        $sitio->delete();
        session()->flash('message', 'Sitio eliminado correctamente!!');

        return redirect()->route('sitio.index');
    }
}
