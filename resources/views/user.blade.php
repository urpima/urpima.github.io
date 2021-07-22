@extends('layouts.masterapp')

@section('content')

<link rel="stylesheet" href="{{ asset('style3.css')}}">
  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img class="img" src="{{ URL::to('/') }}/upload/{{ $user->url }}" alt="{{ $user->name }}">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>Me</span></h1>
        <h2>{{ $user->name }} {{ $user->prenom }}</h2>
        <br>
        <table>
          <tr>
        <td><p>Grade : {{ $user->Grade}}</p></td></tr>
        <tr><td><p>Spécialité : {{ $user->Spécialité}}</p></td></tr>
      </table>
      <h3> Publication : </h3>
      <br> 
     <table>
      <tr><td>
        
      @foreach($auteurpublications as $key => $day )
      <div role="tabpanel" class="col-lg-9 tab-pane fade{{  ' show active'  }}" id="day-{{ $key }}">
            @foreach($day as $auteurpublication)
            <div class="row schedule-item">
            <div class="col-md-10">
            <a href="#" >
              <h4><span>{{ \Carbon\Carbon::parse($auteurpublication->publication->annee)->format("Y/M") }}</span>     {{ $auteurpublication->publication->titre}}   </h4>
              <br>
             </a> </div>
            </div>
          </div>
            @endforeach
        </div>
        @endforeach
     
     </td></tr>
            </table>
            <h3> Projet : </h3>
    </div>
  </section>
  @endsection
  <!-- End About Section -->
