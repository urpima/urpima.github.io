<div class="container">
    <div class="section-header">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <br>
            <br>
            <h2>Membre</h2>
          </div>
        </div>
      </div>
     
    </div>

    <div class="row">
      
    @foreach($users as $user)
        <div class="col-lg-4 col-md-6">
          <div class="speaker">
            <div class="single-team-member">
             <div class="team-img">
                  <a href="#">
                     <img src="{{ URL::to('/') }}/upload/{{ $user->url }}" alt="" class="img-fluid">
                  </a>
                    <div class="details">
                      <div class="team-social-icon text-center">
                        <ul>
                          <li>
                            <a href="#">
                              <i class="fa fa-facebook"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="fa fa-twitter"></i>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="fa fa-instagram"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                </div>
            <div class="team-content text-center">
              <h4><a href="{{ route('user', $user->id) }}" >{{ $user->name }} {{ $user->prenom }}</a></h4>
              <p>{{ $user->Grade }}</p>
            </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
