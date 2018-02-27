<!DOCTYPE html>
<html lang="en">

  <head> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lakbay</title>

    <!-- Bootstrap core CSS -->
    <link href=" <?php echo base_url().'/assets/vendor/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'/assets/css/font-awesome.css'; ?>">

    <!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
        
    <link href=" <?php echo base_url().'/assets/css/agencytwo.css'; ?>" rel="stylesheet">

  </head>
  <body id="page-top">

   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">

        <a class="navbar-brand js-scroll-trigger" href="<?php echo site_url('Welcome/index')?>"><img style="height: 50px; width: 120px;" src="<?php echo base_url('assets/img/supermini.png');?>">&nbsp;<i class="fa fa-home"></i>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Results</a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Link Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo site_url('Welcome/mapview')?>">Map</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
             <form style="padding-top: 5px;" class="input-group quick-search-form" action="<?php echo site_url('Welcome/search');?>" method="post">
     <input style="border-color: #fed136;" type="text" class="form-control" placeholder="Search by word" name="search_val">
  
    <button style="border-color: #fed136;" class="btn btn-custom input-group-text" type="submit" id="quick-search"><i class="fa fa-search"></i></button>
 
                   
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  

    <!-- Portfolio Grid -->
    <section class="" style="background-image: url(<?php echo base_url('assets/img/bg/five2.jpg');?>); background-repeat: no-repeat;
  background-attachment: scroll;
  background-position: center center;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; "  id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">

            <h2 class="result titlehead" style="font-size: 50px; text-shadow: 2px 2px 4px #000000;"><?php if($search_results_budget==NULL){ echo 'No items under specified budget of ₱ '.$this->input->post('function_budget');}else{echo 'Recommended For ₱'.$this->input->post('function_budget'); } ?></h2>
            <h3 class="section-subheading">
<center>
           <form class=" quick-search-form" role="form" action="<?php echo site_url('Welcome/search_budget');?>" method="post">
        <div class="input-group col-md-5 mb-3" style="padding-top: 70px; ">
  <div class="input-group-prepend">
    <span class="input-group-text" style="border-color: #fed136;">Php</span>
  </div>
            <input type="number" class="form-control" placeholder="Your Budget" name="function_budget" style="border-color: #fed136;">
            <div class="input-group-append">
    <span class="input-group-text" style="border-color: #fed136;">.00</span>
  </div> &nbsp;
    <button type="submit" id="quick-search" class="btn btn-custom" style="border-color: #fed136;"><span class="fa fa-search"></span></button>
  </div>
        
      </form>
</center>
</h3>
</h3>
          </div>
        </div>
        <div class="row" style="padding-top: 10px;">

        <?php foreach($search_results_budget as $row){ ?>

         <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="" href="<?php echo site_url('Welcome/single/')?><?php echo $row->name ?>">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="">₱<?php echo $row->budget?></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo base_url($row->image);?>" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?php echo $row->name ?></h4>
              
            </div>
             <p class="col-md-6" style="">
               <?php echo anchor("welcome/single/{$row->name}",'View more...', ['class'=>'portfolio-link text-light']); ?>
             </p>

          </div>

          <?php } ?>
        </div>
      </div>
      
    </section>

    <!-- Services -->
    <section class="bg-light" id="services">
     <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted">We provide links for your convenience.</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <a href="<?php echo site_url('Welcome/links');?>">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-hotel fa-stack-1x fa-inverse"></i>
            </span>
          </a>
            <h4 class="service-heading">Hotel Booking</h4>
            <p class="text-muted">Book for the most affordable and known Hotels.</p>
          </div>
          <div class="col-md-4">
            <a href="<?php echo site_url('Welcome/linksflight');?>">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
            </span>
          </a>
            <h4 class="service-heading">Flight Booking</h4>
            <p class="text-muted">Check out the most affordable and outstanding Flight Booking sites</p>
          </div>
          <div class="col-md-4">
            <a href="<?php echo site_url('Welcome/linksship');?>">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-ship fa-stack-1x fa-inverse"></i>
            </span>
          </a>
            <h4 class="service-heading">Ship Booking</h4>
            <p class="text-muted">Find out the most known and safest Ship Booking sites.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lakbay, Your Travel Buddy</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="<?php echo base_url('assets/img/about/1.jpg');?>" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Overview</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Lakbay was built to give you the ideas of a perfect 
                    place to go to based on your budget.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="<?php echo base_url('assets/img/about/map.jpg');?>" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Maps</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Lakbay has the ability to detect current location and to give
                    directions according to what is the stated starting place going to the chosen destination.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="<?php echo base_url('assets/img/about/links.jpg');?>" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Links</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Lakbay also provide links that can help you to look out for best hotel, flights and ship booking in the country.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="<?php echo base_url('assets/img/about/budget.jpg');?>" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">Budget</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Talking about budgeting, Lakbay is the one you can count on. It has the
                    ability to suggest variety of places based on your budget. Be money wise. Choose your travel
                    buddy wise.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Team</h2>
            <h3 class="section-subheading text-muted">Great teamwork results to a great team.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="<?php echo base_url('assets/img/team/monique.jpg');?>" alt="">
              <h4>Monique Gaerlan</h4>
              <p class="text-muted">Lead Designer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="<?php echo base_url('assets/img/team/mangitngit.jpg');?>" alt="">
              <h4>Bern April Mangitngit</h4>
              <p class="text-muted">Lead Developer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="<?php echo base_url('assets/img/team/malaga.jpg');?>" alt="">
              <h4>Christian Malaga</h4>
              <p class="text-muted">Assistant Developer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">Visit or follow our social media accounts for further
            questions and for more information.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Message Corner</h2>
            <h3 class="section-subheading text-muted">Get in touch with us. We are open for your
            comments, suggestions and recommendations</h3>
            <br/>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <?php echo form_open_multipart('welcome/comment'); ?>
            <form id="" name="" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" name="sname" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" name="email" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" name="phone" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" name="message" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Lakbay 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    

    <!-- Bootstrap core JavaScript -->
    <script src=" <?php echo base_url().'/assets/vendor/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>

    <!-- Plugin JavaScript -->
    <script src=" <?php echo base_url().'/assets/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo base_url().'/assets/js/jqBootstrapValidation.js'; ?> "></script>
    <script src="<?php echo base_url().'/assets/js/contact_me.js'; ?> "></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url().'/assets/js/agency.min.js'; ?>"></script>

  </body>

</html>