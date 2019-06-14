<template>


 
            <div class="card"  >
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form @submit.prevent="onSubmit()" >
                     

                        <div class="form-group">
                            <label for="email" class=" control-label">Email Address</label>

                            <div >
                                <input id="email" type="email" class="form-control" v-model="data.email"  required autofocus>

                          
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class=" control-label">Password</label>

                            <div >
                                <input id="password" type="password" class="form-control" v-model="data.password" required>

                    
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" v-model="data.remember" > 
                                        <span class="remember">Remember Me</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                                <button type="submit" class="btn btn-primary btn-block">
                                  Login
                                </button>

                                <a class="btn btn-link" href="">
                                   Forget Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

     


</template>

<script>
    export default {
     data(){
       return{
      
	       data:{
		   		email:'',
		       	password:'',
		       	remember:false
	       }
       }
     } ,
     mounted(){
  
     },
     methods:{
     	onSubmit(){
     		axios.post('/login',this.data)
			    .then(response=>{
             if(response.data.data.api_token){
              laravel.auth = true;
              window.user ={
                name     :response.data.data.name,
                userName : response.data.data.userName,
                api_token:response.data.data.api_token,
              }; 
              this.$router.push('/');
             }
			    })
			    .catch(error=>
             console.log(error)
          );
     	}
     }
    
    }
</script>




 
