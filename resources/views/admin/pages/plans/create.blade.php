@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
    <h1>Cadastrar novo plano </h1>
    @stop
    @section('content')
    <div class="card">
        <div class="car-body">
            <form action="{{ route('plans.store')}}" class="form p-3" method="POST">
                @csrf
                    

                @include('admin.pages.plans._partials.form')
                    
            </form>

        </div>
    </div>
    @endsection