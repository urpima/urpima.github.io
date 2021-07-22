<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
      <div class="section-header">
        <h2>Seminaire</h2>
        <p>Voici notre seminaire</p>
      </div>
  
  
      <h3 class="sub-heading"></h3>
  
      <div class="tab-content row justify-content-center">
        @foreach($speakers as $key => $day )
          <div role="tabpanel" class="col-lg-9 tab-pane fade{{  ' show active'  }}" id="day-{{ $key }}">
            @foreach($day as $speaker)
              <div class="row schedule-item">
                <div class="col-md-2"><time>{{ \Carbon\Carbon::parse($speaker->start_time)->format("h:i A") }}</time>
                  
                </div>
                <div class="col-md-10">
                  @if($speaker->photo)
                    <div class="speaker">
                      <img src="{{ URL::to('/') }}/upload/{{ $speaker->photo }}" alt="{{ $speaker->name }}">
                      
                    </div>
                  @endif
                  <h4>{{ $speaker->axe->nom }} <span>{{ $speaker->name }}</span></h4>
                  <p>{{ $speaker->subtitle }}</p>
                  <p>{{ $speaker->description }}</p>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </section>
  