<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
      <div class="section-header">
        <h2>Publication</h2>
        <p>Voici notre publication</p>
      </div>
  
  
      <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
        necessitatibus voluptatem quis labore perspiciatis quia.</h3>
  
      <div class="tab-content row justify-content-center">
        @foreach($auteurpublications as $key => $day )
          <div role="tabpanel" class="col-lg-9 tab-pane fade{{  ' show active' }}" id="day-{{ $key }}">
            @foreach($day as $auteurpublication)
              <div class="row schedule-item">
                <div class="col-md-2">
                    <h4>{{ \Carbon\Carbon::parse($auteurpublication->publication->annee)->format("Y") }}</h4>
                </div>
                <div class="col-md-10">
                  @if($auteurpublication->user->url)
                    <div class="speaker">
                      <img src="{{ URL::to('/') }}/upload/{{ $auteurpublication->user->url }}" alt="{{ $auteurpublication->user->name }}">
                      
                    </div>
                  @endif
                  <h4>{{ $auteurpublication->publication->titre }} <span>{{ $auteurpublication->user->name }}</span></h4>
                  <p>{{ $auteurpublication->user->name }}</p> <p>{{ $auteurpublication->user->prenom }}</p>
                 
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </section>
  