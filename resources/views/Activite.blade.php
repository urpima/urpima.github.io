@extends('layouts.masterapp')
@section('title','Activite')
@section('content')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

  @include('sections.Activite')
  @include('sections.sponsors')

@endsection