<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index($idEmpresa)
    {
        $empresa = Empresa::find($idEmpresa);

        $departamentos = Departamento::with(['fotos'])
        ->where('empresa_id', $idEmpresa)
        ->paginate(env('PAGINACAO'));

        return view('site.cidades.departamentos.index', compact('empresa', 'departamentos'));
    }

    public function show($idEmpresa, $idDepartamento)
    {
        $departamento = Departamento::find($idDepartamento);

        return view('site.cidades.departamentos.show', compact('departamento'));
    }
}
