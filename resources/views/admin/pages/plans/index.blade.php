@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">Adicionar <i class="fas fa-plus"></i></a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">DashBoard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">planos</a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
       <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
           @csrf
           <input type="text" name="filter" placeholder ="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
           <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-filter"></i></button>
       </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="250">Ações</th>
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
                            <a href="{{ route ('details.plan.index', $plan->url)}}" class="btn btn-primary">Detalhes</a>
                            <a href="{{ route ('plans.edit', $plan->url)}}" class="btn btn-info">Editar</a>
                            <a href="{{ route ('plans.show', $plan->url)}}" class="btn btn-warning">Ver</a>
                            
                        </td>
                        
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        
        @if (isset($filters))
        
        {!! $plans->appends($filters)->links("pagination::bootstrap-4") !!}

        @else
        {!! $plans->links("pagination::bootstrap-4") !!}

        @endif
    </div>
</div>
@stop
