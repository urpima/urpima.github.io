<!DOCTYPE html>
<html lang="en">

<body>
<section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title"><span>Projets</span></h1>
      </div>

      <div class="all-projects">
  
 @foreach($projets as $projet)
       
        <div class="project-item">
          <div class="project-info">
          <h1>{{ $projet->titre }}</h1>
          <h2>{{ $projet->nature }}</h2>
          <p>{{ $projet->description }}</p>
          </div>
          <div class="project-img">
          <img src="assets2/img/img-1.png"  alt="img">
                    </div>
        </div>
      
          @endforeach
   
      </div>
    </div>
  </section>
  </body>
  </html>