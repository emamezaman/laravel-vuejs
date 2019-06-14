<template>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
 
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

      <li class="nav-item" v-if="!laravel.auth">
        
             <router-link class="nav-link " 
                          :to="{name:'login'}">
                    Login
            </router-link>
      </li>
      <li class="nav-item" v-if="!laravel.auth">
        
             <router-link class="nav-link " 
                          :to="{name:'register'}">
                  Register
             </router-link>
      </li>
      <li class="nav-item" v-if="laravel.auth">
          <router-link class="nav-link " 
                       :to="{name:'userProfile'}"
                       v-text="user.name">
               
             </router-link>
      </li>
      <li class="nav-item" v-if="laravel.auth">
        <form @submit.prevent="onSubmit()">
          <button class="btn btn-warning"
                  type="submit">
          Logout
        </button>
        </form>
      </li>
     
       
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

</template>

<script>
    export default {
       //props:['user','laravel'],
        data(){
        	return {
        		  laravel :window.laravel,
              user :   window.user

        	}
        },
        methods:{
            onSubmit(){
                axios.post('/logout')
                .then(response=>{
                 if(response.data.status=='success'){
                    laravel.auth = false;
                    window.user = {
                      name:'',
                      email:'',
                      userName:'',
                      api_token:'',
                      created_at:''
                  };
                 }
                })
                .catch(error=>console.log(error));
            }
          
        }


    }
</script>
