<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    
    <title>Dashbord Admin</title>
  
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
     <link href="{{asset('css/admin.css')}}" rel="stylesheet">
     
  </head>

   <body>
<div id="app">
      <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <router-link class="dropdown-item" 
                             :to="{name:'createCategory'}">Create</router-link>
                <router-link class="dropdown-item" 
                             :to="{name:'listCategory'}">List</router-link>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Next Later</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Articles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <router-link class="dropdown-item" 
                             :to="{name:'createArticle'}">Create</router-link>
                <router-link class="dropdown-item" 
                             :to="{name:'listArticle'}">List</router-link>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Next Later</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <router-link class="dropdown-item" 
                             :to="{name:'addUser'}">Create</router-link>
                <router-link class="dropdown-item" 
                             :to="{name:'listUser'}">List</router-link>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Next Later</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <section  class="container mt-4 mb-2">
      <div class="row">
         

         <div class="col-md-12  col-lg-12">
           <router-view></router-view>
         </div>



      </div>
    </section>
</div>


 
   
 
  </body>
</html>
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

        <script type="text/javascript" src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/sweetalert.min.js')}}"></script>
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('js/admin.js')}}"></script>

