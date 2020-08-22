@extends('adminlte::page')

@section('title', 'Detales do plano')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{ route('admin.index') }}">Dashboard</a></li> 
    <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.details.index', $plans->url) }}">Detalhes</a></li>
    
</ol>
   
    @stop