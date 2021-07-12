@extends('layouts.masterapp')
@section('title','Projets')
@section('content')

<link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
  @include('sections.projet')
@endsection