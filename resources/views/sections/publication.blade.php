<style>
a {
    color: #000;
    transition: 0.5s;
}

</style>
<section id="schedule" class="section-with-bg">
  <div class="container wow fadeInUp">
    <div class="section-header">
      <h2>Publications</h2>
    </div>
    <ul class="nav nav-tabs" role="tablist">
      @foreach($publications as $key=>$annee)
      @foreach($annee as $publication)
        <li class="nav-item">
          <a class="nav-link{{ $key === 1 ? ' active' : '' }}" href="#annee-{{ $key }}" role="tab" data-toggle="tab">{{ $publication->annee}}</a>
        </li>
      @endforeach
      @endforeach
    </ul>
  <table class="table table-hover">

<tbody>
<div class="tab-content row justify-content-center">
  @foreach($publications as $key => $annee)
      
<div role="tabpanel" class="col-lg-9 tab-pane fade{{ $key === $annee? ' show active' : '' }}" id="annee-{{ $key }}">
         
        @foreach($annee as $publication)
        <tr > 
           <td style="vertical-align: middle">@if($publication->user)
                 
                    <img src="{{ URL::to('/') }}/upload/{{ $publication->user->url }}" alt="{{ $publication->user->name }}" class="img-fluid">
                    <div class="details">
                    <h5><a href="{{ route('publication', $publication->id) }}">{{ $publication->user->name }}</a></h5>
                    </div>
                @endif
                </td>
                <td >
                <h4 align="left"> <a href="{{ route('publication', $publication->id) }}">{{ $publication->titre }}</a> <h4>
                <h4>{{ $publication->titre }} </h4>
                <p>{{ $publication->typedocument }}</p>
            </td>
            </tr> 
          @endforeach
    </div>
      @endforeach
      
</tbody>
</table>
    </div>
  </div>
</section>
