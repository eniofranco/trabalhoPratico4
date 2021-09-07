<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoRequest;
use App\Models\Departamento;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Image;




class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idDepartamento)
    {
        $departamento = Departamento::find($idDepartamento);

        $fotos = Foto::where('departamento_id', '=', $idDepartamento)->get();

        return view('Admin.Departamento.fotos.index', compact('departamento', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idDepartamento)
    {
        $departamento = Departamento::find($idDepartamento);

        return view('Admin.Departamento.fotos.form', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request, $idDepartamento)
    {
        if($request->hasFile('foto')){

            if($request->foto->isValid()){

                $fotoURL = $request->foto->hashName("departamentos/$idDepartamento");

                $imagem = Image::make($request->foto)->fit(env('FOTO_LARGURA'), env('FOTO_ALTURA'));

                Storage::disk('public')->put($fotoURL, $imagem->encode());

                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->departamento_id = $idDepartamento;
                $foto->save();

            }

        }
        $request->session()->flash('sucesso', 'Foto incluída com sucesso!');
        return redirect()->route('admin.departamentos.fotos.index', $idDepartamento);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idDepartamento, $idFoto)
    {
        $foto = Foto::find($idFoto);

        Storage::disk('public')->delete($foto->url);

        $foto->delete();

        $request->session()->flash('sucesso', 'Foto excluída com sucesso!');

        return redirect()->route('admin.departamentos.fotos.index', $idDepartamento);

    }
}
