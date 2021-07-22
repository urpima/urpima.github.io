
<section id="schedule" class="section-with-bg">
  <div class="container wow fadeInUp">
    <div class="section-header">
      <h2>Publications</h2>
    </div>


    <h3 class="sub-heading"></h3>

    <div class="tab-content row justify-content-center">
      @foreach($publications  as $key => $day)
        <div role="tabpanel" class="col-lg-9 tab-pane fade{{' show active'  }}" id="day-{{ $key }}">
          @foreach($day as $publication)
            <div class="row schedule-item">
              <div class="col-md-2">
                <h4>{{ \Carbon\Carbon::parse($publication->annee)->format("Y") }} </h4>
              </div>
              <div class="col-md-10">
                @if($publication->user)
                  <div class="speaker">
                    <img src="{{ URL::to('/') }}/upload/{{ $publication->user->url }}" alt="{{ $publication->user->name }}">
                    
                  </div>
                @endif
                <h4>{{ $publication->titre }} @if($publication->user)<span>{{ $publication->user->name }}</span>@endif</h4>
                <p>{{ $publication->titre }}</p>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>
</section>





