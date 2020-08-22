@extends('adminlte::page')

@section('title', "Detales do plano { $plano->name }")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{ route('admin.index') }}">Dashboard</a></li> 
    <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
    
</ol>
    <h1> detalhes do plano {{ $plan->name }}<a href="{{route('plans.create')}}" class="btn btn-dark">ADD <i class="fas fa-plus-circle"></i></a></h1>
    
    
    @stop
    @section('content')
        <div class="card">
            <div class="car-header">
                
                <form action="{{ route('plans.search')}}" method="POST" class="form form-inline">
                        @csrf 
                <input type="text" name="filter" placeholder="Pesquisar..." class="form-control" value="{{ $filters['filter'] ?? '' }}">
                        <button type="submit" class="btn btn-dark">Pesquisar</button>
                </form>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preco</th>
                            <th width="150px">Accao</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>

                           
                            
                            <td style="width=10px">
                                <a href="{{ route('details.plan.index', $Plan->url) }}"class="btn btn-primary ">Detalhes</a>
                                <a href="{{ route('plans.edit', $Plan->url) }}"class="btn btn-info ">Editar</a>
                                {{-- tenho que tambem passsar o objeto plan --}}
                            <a href="{{ route('plans.show', $Plan->url) }}" class="btn btn-warning ">Ver</a>
                            </td>

                        </tr>

                         @endforeach

                         
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

                @if(isset($filters))
                {!! $detail->appends($filters)->links() !!}    

                @else
                {!! $detail->links() !!}
                @endif
            </div>
        </div>
    @stop