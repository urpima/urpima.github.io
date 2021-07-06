@extends('layouts.main')
@section('content')

<main id="main">
  
  @include('sections.speakers')
  @include('sections.schedule')
  @include('sections.gallery')
  @include('sections.sponsors')
</main>
@endsection