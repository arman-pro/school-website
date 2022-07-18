
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title')-School Management System</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    {{-- my style sheet --}}
    {{-- <link rel="stylesheet" href={{asset('/css/app.css')}}> --}}

    <!-- Font awesome -->
    <link href={{ asset('css/font-awesome.css') }} rel="stylesheet">
    <!-- Bootstrap -->
    <link href={{ asset('css/bootstrap.css') }} rel="stylesheet">   
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/slick.css') }}">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ asset('/css/jquery.fancybox.css') }}" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('assets/css/default-theme.css') }}" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      marquee {
        background: #4c566a;
      }
      .news {
        margin: 0; 
        padding: 0;
      }

      .news > li {
        list-style-type: none;
        float: left;
        margin: 5px;
        margin-right: 10px;
      }

      .news > li > a {
        color: white;
        text-decoration: none;
      }

      .news > li > a:hover {
        color: #1c7ed6;
      }

      header  a {
          color: white !important;
      }
      
      header a:hover {
          color: black !important;
      }
      
      #top-menu {
          width: 100%;
          text-align:center;
      }
      
      #top-menu > li {
          display:inline-block;
      }

    </style>
    @yield('mini-style')

  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header" style="background: #6166B3 !important;color:white;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@markups.io</span>
                  </div>
                  
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(568) 986 652</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4" style="padding:0;" >
                <a style="padding:0;font-size:16px;" href="{{url('/')}}"><i class="fa fa-university"></i><span>গোপীনাথপুর শালমারী সরকারী প্রাথমিক বিদ্যালয়</span></a>
             </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                     @guest
                      @if (Route::has('login'))                   
                        <li><a href="{{route('login')}}">Admin Login</a></li>
                      @endif
                     @endguest
                     @auth
                         @if (Route::has('admin'))
                             <li><a target="_blank" class="btn btn-sm btn-outline-info" href="{{route('admin')}}">Admin Panel</a></li>
                         @endif
                     @endauth
                      <li><a href="{{route('notice')}}">Recent Notice</a></li>
                      <li><a href="{{route('news')}}">News</a></li>
                      
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation" style="min-height:46px;background:#F7F7F7;">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          {{-- <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Varsity</span></a> --}}
          <!-- IMG BASED LOGO  -->
          {{-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> --}}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-right main-nav text-sm">
            <li class="active"><a href={{url("/")}}>Home</a></li>            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">Administration <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href={{url('/president')}}>President</a></li>                
                <li><a href={{url('/principal')}}>Principal</a></li>                
                <li><a href={{url('/vice-principal')}}>Vice Principal</a></li>                
                <li><a href={{url('/governing-body')}}>Governing Body</a></li>                
                <li><a href={{url('/faculty-member')}}>Faculty Member</a></li>                
                <li><a href={{url('/office-stuff')}}>Office Stuff</a></li>                
              </ul>
            </li> 
            @if (!$pages->isEmpty())
            @foreach ($pages as $page)
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$page->name}} <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                @foreach ($page->categories as $category)
                  <li>
                    <a href="{{route('page', ['category'=> $category->id, 'name' => strtolower(implode('-', explode(' ', $category->name))) ])}}">
                      {{$category->name}}
                    </a>
                  </li> 
                @endforeach       
              </ul>
            </li> 
            @endforeach
            @endif
            <li><a href="{{route('100')}}"><b><span class="text-success">100 Years</span> <span class="text-danger">Celebration</span></a></b></li>
      
 
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
    @if (!$newses->isEmpty())
    <marquee behavior="" direction="left" style="min-width:130%;width:auto;overflow:hidden;">
      <ul class="news">
      <?php
        $i =0;
        foreach ($newses as $news) {
          $i++;
          if($i == 5) {
            break;
          }
      ?>
       <li><a href="{{route('news.show', ['id' => $news->id])}}">{{$news->title}}</a></li>
      <?php
        }
      ?>      
      </ul>
    </marquee>
    @endif
    
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Start Slider -->
  {{-- <section id="mu-slider">
  
    <!-- Start single slider item -->
    @foreach ($sliders as $slider)
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src={{ asset('storage/img/slider/').'/'.$slider->thumbnail }} alt="{{$slider->thumbnail}}">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h6>{{$slider->subTitle}}</h6>
        <span></span>
        <h3>{{$slider->title}}</h3>
        <p>{{$slider->description}}</p>
      </div>
    </div>
    @endforeach
  </section> --}}

  <section id="banner" style="width:100%;height:650px;background:url('{{asset('storage/img/banner/banner_one.jpg');}}');background-position:center;background-size:cover;">
    {{-- <img  src="{{asset('storage/img/banner/banner_one.jpg')}}" alt="School Banner"/> --}}
  </section>



  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-book"></span>
              <h3>Teaching</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-users"></span>
              <h3>Creativity</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-table"></span>
              <h3>Recreation</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>About Us</h2>              
                  </div>
                  <!-- End Title -->
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum pariatur fuga eveniet soluta aspernatur rem, nam voluptatibus voluptate voluptates sapiente, inventore. Voluptatem, maiores esse molestiae.</p>
                  <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Saepe a minima quod iste libero rerum dicta!</li>
                    <li>Voluptas obcaecati, iste porro fugit soluta consequuntur. Veritatis?</li>
                    <li>Ipsam deserunt numquam ad error rem unde, omnis.</li>
                    <li>Repellat assumenda adipisci pariatur ipsam eos similique, explicabo.</li>
                  </ul>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quaerat harum facilis excepturi et? Mollitia!</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">                            
                  <img style="width:100%;" src={{asset('/img/school.jpg')}} alt="img">              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

<!-- Start about us counter -->
<section id="mu-about-us" >
  <div class="container">
    <div class="row">
      {{-- right sidebar --}}
      {{-- principal and chairman description --}}
      <div class="sidebar col-md-3">
        <div class="box">
          <h4>Principal's Word</h4>
          @if(!$principalMessage->isEmpty())
          <img style="width:100%;" src="{{asset('storage/img/teacher')}}/{{$principalMessage[0]->messengerImage}}" alt="Teacher Image"/>
          <p>{{substr($principalMessage[0]->messages, 0, 100)}}<b>....</b><span><a href="{{url('/principal')}}">more</a></span></p>
          @endif
        </div>

        <div class="box">
          <h4>Vice Principal's Word</h4>
          @if(!$viceMessage->isEmpty())
          <img style="width:100%;" src="{{asset('storage/img/teacher').'/'.$viceMessage[0]->messengerImage}}" alt="Teacher Image"/>
          <p>{{substr($viceMessage[0]->messages, 0, 100)}}<b>....</b><span><a href="{{url('/vice-principal')}}">more</a></span></p>
          @endif
        </div>

      </div>
      {{-- middle section --}}
      <div class="col-md-6">

        {{-- main body --}}
        @yield('body')

      </div>

      {{-- left side bar  --}}
      <div class="col-md-3 p-5">
        <div class="list-group">
          <a class="list-group-item active">
            Recent Noticle
          </a>
          @if (!$notices->isEmpty())
            @foreach ($notices as $notice)
              <a href="{{route('details', ['id'=>$notice->id])}}" class="list-group-item">
                {{$notice->title}}<br/>
                <small class="text-sm text-muted">{{date('d M, Y g:i A', strtotime($notice->created_at))}}</small>
              </a>
              
            @endforeach
          @else
          <li class="list-group-item text-right"> Notice not Found</li>
          @endif         
          <li class="list-group-item text-right">
            <a href="{{route('notice')}}" class="btn btn-sm btn-danger">See All</a>
          </li>
        </div>

    
      </div>
    </div>
  </div>
</section>


  <br/>

  <!-- Start footer -->
  <footer id="mu-footer" style="background-image: url({{asset('storage/img/banner/banner_one.jpg')}})">
    <!-- start footer top -->
    <div class="mu-footer-top" style="background: rgba(0,0,0,0.9)">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Information</h4>
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="">Features</a></li>
                  <li><a href="">Course</a></li>
                  <li><a href="">Event</a></li>
                  <li><a href="">Sitemap</a></li>
                  <li><a href="">Term Of Use</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Recent News</h4>
                <ul>
                @if (!$newses->isEmpty())
                  @foreach ($newses as $news)
                  <li><a href="{{route("news.show", ['id'=>$news->id])}}">{{$news->title}}</a></li>
                  @endforeach
                @else
                <li><a href="#">No Recent News Available</a></li>
                @endif               
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>News letter</h4>
                <p>Get latest update, news & academic offers</p>
                <form class="mu-subscribe-form">
                  <input type="email" placeholder="Type your Email">
                  <button class="mu-subscribe-btn btn btn-info" type="submit">Subscribe!</button>
                </form>               
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contact</h4>
                <address>
                  <p>P.O. Box 320, Ross, California 9495, USA</p>
                  <p>Phone: (415) 453-1568 </p>
                  <p>Website: www.markups.io</p>
                  <p>Email: info@markups.io</p>
                </address>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    {{-- <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; All Right Reserved. Designed by <a href="http://www.markups.io/" rel="nofollow">MarkUps.io</a></p>
        </div>
      </div>
    </div> --}}
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src={{ asset('/js/jquery.min.js') }}></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src={{ asset('/js/bootstrap.js') }}></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src={{ asset('/js/slick.js') }}></script>
  <!-- Counter -->
  <script type="text/javascript" src={{ asset('/js/waypoints.js') }}></script>
  <script type="text/javascript" src={{ asset('/js/jquery.counterup.js') }}></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src={{ asset('/js/jquery.mixitup.js') }}></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src={{ asset('/js/jquery.fancybox.pack.js') }}></script>
  
  
  <!-- Custom js -->
  <script src={{asset('/js/custom.js')}}></script> 

</body>
</html>