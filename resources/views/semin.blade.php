@extends('layouts.masterapp')
@section('title','Seminaire')
@section('content')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

  @include('sections.speakers')
  @include('sections.schedule')
  @include('sections.gallery')
  @include('sections.sponsors')

@endsection