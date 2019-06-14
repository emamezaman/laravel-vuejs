<template>
   <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form @submit.prevent="onSubmit()" >
                        

                        <div class="form-group" >
                            <label >Name </label>

                            <div  >
                                <input id="name" 
                                       type="text" 
                                       class="form-control" 
                                       v-model="data.name"  
                                       autofocus>
                            </div>
                        </div> 
                        <div class="form-group" >
                            <label >UserName </label>

                            <div  >
                                <input id="UserName" 
                                       type="text" 
                                       class="form-control" 
                                       v-model="data.userName"  
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="  control-label">Email Address</label>

                            <div  >
                                <input id="email" type="email" class="form-control" v-model="data.email"   required>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="  control-label">Password</label>

                            <div class=" ">
                                <input id="password" type="password" class="form-control" v-model="data.password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="  control-label">Repeat Password</label>

                            <div class=" ">
                                <input id="password-confirm" type="password" class="form-control" v-model="data.password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                                <button type="submit" class="btn btn-primary btn-block">
                                 Register
                                </button>
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
            name:'',
		       	userName:'',
		   		  email:'',
		       	password:'',
		       	password_confirmation:''
	       }
       }
     } ,
     methods:{
     	onSubmit(){
     		axios.post('/register',this.data)
			     .then(response=>this.$router.push('/login'))
			    .catch(error=>console.log(error));
     	}
     }
    
    }
</script>
                
             
         
                



 
