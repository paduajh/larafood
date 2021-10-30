@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">Adicionar</a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        #filtros
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>
                            {{ $plan->name }}
                        </td>
                        <td>
                           <strong>R$</strong> {{ number_format($plan->price, 2,',','.') }}
                        </td>
                        <td style="width: 10px;">
                            <a href="{{ route ('plans.show', $plan->url)}}" class="btn btn-warning">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {!! $plans->links("pagination::bootstrap-4") !!}
    </div>
</div>
@stop
