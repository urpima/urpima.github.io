<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
      <div class="section-header">
        <h2>Event Schedule</h2>
        <p>Here is our event schedule</p>
      </div>
  
      <ul class="nav nav-tabs" role="tablist">
        @foreach($speakers as $key => $day)
          <li class="nav-item">
            <a class="nav-link{{ $key === 1 ? ' active' : '' }}" href="#day-{{ $key }}" role="tab" data-toggle="tab"><time>{{ \Carbon\Carbon::parse($speaker->start_time)->format("h:i A") }}</time> {{ $key }}</a>
            
        </li>
        @endforeach
      </ul>
  
      <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
        necessitatibus voluptatem quis labore perspiciatis quia.</h3>
  
      <div class="tab-content row justify-content-center">
        @foreach($speakers as $key => $day )
          <div role="tabpanel" class="col-lg-9 tab-pane fade{{ $key === 1 ? ' show active' : '' }}" id="day-{{ $key }}">
            @foreach($day as $speaker)
              <div class="row schedule-item">
                <div class="col-md-2"><time>{{ \Carbon\Carbon::parse($speaker->start_time)->format("h:i A") }}</time>
                    <h4>{{ $speaker->axe->nom }}</h4>
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
  