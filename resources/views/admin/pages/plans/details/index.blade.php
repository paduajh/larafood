@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    
<h1>Detalhes do Plano {{ $plan->name }} <a href="{{ route( 'plans.create') }}" class="btn btn-dark">Adicionar <i class="fas fa-plus"></i></a></h1>
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">DashBoard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.show' , $plan->url) }}">{{ $plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}"class="active">Detalhes</a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>
                            {{ $detail->name }}
                        </td>
                        <td>
                           <strong>R$</strong> {{ number_format($plan->price, 2,',','.') }}
                        </td>
                        <td style="width: 10px;">
                            <a href="{{ route ('plans.edit', $plan->url)}}" class="btn btn-info">editar</a>
                            <a href="{{ route ('plans.show', $plan->url)}}" class="btn btn-warning">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
    <div class="card-footer">
        
        @if (isset($filters))
        
        {!! $details->appends($filters)->links("pagination::bootstrap-4") !!}

        @else
        {!! $details->links("pagination::bootstrap-4") !!}

        @endif
    </div>
</div>
@stop
