<!DOCTYPE html>
<html lang="en" >

<head>

   @include('partials.meta')

    <title>صحفه اصلی</title>
    <meta name="csrf-token" content="{{csrf_token()}}">

    

     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
     <link href="{{asset('css/index.css')}}" rel="stylesheet">

</head>

<body>

  

    <div id="app">
   
    <my-header  ></my-header>
                <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    <router-view>
                        
                    </router-view>

                </div>

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">
               
                </div>

            </div>
            <!-- /.row -->
         

            <!-- Footer -->
        

        </div>
    </div>
    <!-- /.container -->
    <script>
        window.laravel = {
            auth:false,
            token:'{{ csrf_token() }}'
        };
        window.user = {
          name:'',
          email:'',
          userName:'',
          api_token:'',
          created_at:''
        
        };
        
 
        @if(Auth::check()) 
         window.user.name        = '{{auth()->user()->name}}';
         window.user.userName    = '{{auth()->user()->userName}}';
         window.user.email       = '{{auth()->user()->email}}';
         window.user.created_at  = '{{auth()->user()->created_at}}';
         window.user.api_token   = '{{auth()->user()->api_token}}';
         window.laravel.auth     =true;
        @endif
 
         
    </script>
<script type="text/javascript"
        src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
        <script type="text/javascript"
        src="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript"
        src="{{asset('js/bootstrap.min.js')}}"></script>
     <script src="{{url('js/app.js')}}"></script>

</body>

</html>
