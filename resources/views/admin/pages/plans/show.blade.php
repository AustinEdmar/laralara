@extends('adminlte::page')

@section('title', "Detalhes do plano $plan->name")

@section('content_header')
    <h1>Detalhes do plano <b>{{ $plan->name }}</b> </h1>
    @stop
    @section('content')
    <div class="card">
        <div class="car-body p-3">

            <ul>
                <li>
                    <strong>Nome:</strong> {{$plan->name }}
                </li>

                <li>
                    <strong>URL:</strong> {{$plan->url }}
                </li>
                

                <li>
                    <strong>Preco:</strong>KZ {{number_format($plan->price, 2, ',', '.') }}
                </li>

                <li>
                    <strong>descricao:</strong> {{$plan->description }}
                </li>
            </ul>

            <form action="{{ route('plans.destroy', $plan->url)}}" method="POST"> 
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar plano</button>
            </form>
        </div>
    </div>
            @endsection