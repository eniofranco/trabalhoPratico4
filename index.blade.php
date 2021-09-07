@extends('site.layouts.principal')

@section('conteudo-principal')

    <section class="section lighten-4 center">

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around">

            @foreach ($empresas as $empresa)
                <a href="{{route('empresas.departamentos.index', $empresa->id)}}">

                    <div class="card-panel" style="width: 280px; height: 100%;">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h4 class="black-text">{{$empresa->nome}}</h4>

                    </div>

                </a>
            @endforeach

        </div>

    </section>

@endsection

@section('slider')

    <section class="slider">
        <ul class="slides">
            <li>
                <img src="https://source.unsplash.com/9MoQKZW0nGU/1900x600" />
                <div class="caption center-align">
                    <h2>Empresa Muito Conceituada!!</h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/aWf7mjwwJJo/1900x600" />
                <div class="caption left-align">
                    <h2>Os Melhores Profissionais!!</h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/NDoVgcS_lZM/1900x600" />
                <div class="caption right-align">
                    <h2>Somos Líderes de Mercado!!</h2>
                </div>
            </li>

        </ul>

    </section>

@endsection
