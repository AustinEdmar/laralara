@extends('adminlte::page')

@section('title', "editar o plano { $plan->name}")

@section('content_header')
    <h1>Cadastrar novo plano  {{ $plan->name }} </h1>
    @stop
    @section('content')
    <div class="card">
        <div class="car-body">
            <form action="{{ route('plans.update', $plan->url)}}" class="form p-3" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
                    
            </form>

        </div>
    </div>
    @endsection