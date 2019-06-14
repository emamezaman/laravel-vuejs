<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>داشبورد</title>
    <!-- Bootstrap core CSS -->
  <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
     <link href="{{asset('layoutAdmin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('layoutAdmin/css/bootstrap-reset.css')}}" rel="stylesheet">
    
    <link href="{{asset('layoutAdmin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" /> 
    <link href="{{asset('layoutAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    
    
    <link href="{{asset('layoutAdmin/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('layoutAdmin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/adminStyle.css')}}" rel="stylesheet">
  </head>

  <body>
  <section id="container" class="">

      <!--sidebar start-->
      <div class="row" id="app">
      <aside class="col-md-3">
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a href="#"  >
                          <i class="glyphicon glyphicon-home"></i>
                          <span>خونه </span>
                      </a>
                  </li>
                  <li class="active">
                      <router-link to="/admin/amaresite"  >
                         
                          <span>آمار سایت </span>
                      </router-link>
                  </li> 
                  <li class="active">
                      <router-link to="/admin/news"  >
                        
                          <span>اخبار </span>
                      </router-link>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                    
                          <span>مقالات سایت</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li> 
                            <router-link to="/admin/article/create/form">ایجاد</router-link>
                          </li>
                          <li> 
                             <router-link to="/admin/articles">نمایش و مدریت
                             </router-link>
                          </li>
                          

                      </ul>
                  </li>  

                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                    
                          <span>Categories</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li> 
                            <router-link :to="{name:'createCategory'}">Add category</router-link>
                          </li>
                          <li> 
                             <router-link :to="{name:'listCategory'}">List Category
                             </router-link>
                          </li>
                          

                      </ul>
                  </li>
                  
            <li>
            <a  href="#">
             
            <i class="glyphicon glyphicon-log-out "></i>
            <span>خروج</span>
        
            </a>
            </li>
            
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content" class="col-md-8">
        
         <section class="wrapper" >
           
           <router-view>
             
           </router-view>
             
   </section>
      
      </section>
      <!--main content end-->
      </div>



  </section>
    <!--common script for all pages-->
      <script>
        window.laravel = {
            auth:false,
            token:'{{ csrf_token() }}'
        };
        window.user = {
            name:'',
            api_token:''
        };
        
 
        @if(Auth::check()) 
         window.user.name = '{{auth()->user()->name}}';
         window.user.api_token = '{{auth()->user()->api_token}}';
         window.laravel.auth=true;
        @endif
 
         
    </script>
    <script src="{{asset('layoutAdmin/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('layoutAdmin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('layoutAdmin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('layoutAdmin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('layoutAdmin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('layoutAdmin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
  
    <script src="{{asset('layoutAdmin/js/jquery.customSelect.min.js')}}" ></script>

    <!--common script for all pages-->
    <script src="{{asset('layoutAdmin/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('layoutAdmin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('layoutAdmin/js/easy-pie-chart.js')}}"></script>
 
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('layoutAdmin/js/common-scripts.js')}}"></script>
 
  </body>
</html>

