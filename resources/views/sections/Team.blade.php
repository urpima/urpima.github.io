<!--
<!- ======= Team Section ======= 
<div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="d-flex flex-wrap bg-light">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our special Team</h2>
            </div>
          </div>
        </div>
        <div class="d-flex flex-wrap bg-light">
        @foreach($users as $user)
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="{{ URL::to('/') }}/upload/{{ $user->url }}" alt="">
                </a>
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
              <div class="team-content text-center">
                <h4>{{ $user->Name}}  {{ $user->prenom}} </h4>
                <p>Seo</p>
              </div>
            </div>
          </div>
           End column 
           End Team Section 
         </div> 
         @endforeach-->


  <div class="container">
    <div class="section-header">
      <h2>Seminaire</h2>
      <p>Here are some of our speakers</p>
    </div>

    <div class="row">
    @foreach($users as $user)
        <div class="col-lg-4 col-md-6">
          <div class="speaker">
            <img src="{{ URL::to('/') }}/upload/{{ $user->url }}" alt="" class="img-fluid">
            <div class="details">
              <h3><a href="#">{{ $user->name }}</a></h3>
              <p>{{ $user->Grade }}</p>
              <div class="social">
                
                  <a href="#"><i class="fa fa-twitter"></i></a>
                
                
                  <a href="#"><i class="fa fa-facebook"></i></a>
                
                
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

<!--
  <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
                  <img src="assets/img/team/3.jpg" alt="">
                </a>
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
              <div class="team-content text-center">
                <h4>Lellien Linda</h4>
                <p>Web Design</p>
              </div>
            </div>
          </div>
          -->