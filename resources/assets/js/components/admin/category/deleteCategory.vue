<template>
	<div>
		<div class="card">
			<div class="card-header ">
			 
				 <router-link class="btn btn-md btn-primary float-right"
				               :to="{name:'listCategory'}">
				 	Back
				 </router-link>
				 <div style="clear: both;"></div>	
			</div>
			<div class="card-body ">
            <ul class="list-group">
            	<li class="list-group-item">
            		<label>Name : </label>{{category.name}}
            	</li>
            	 
             
            </ul>
			<div class="card-footer">
				<div >
					<button class="btn btn-danger btn-md"
					         @click="deleteCategory()">Delete</button>	
					         <router-link class="btn btn-primary btn-md"
					                      :to="{name:'listCategory'}">cancel</router-link>
				</div>
			</div>

			</div>
		</div>
	</div>
</template>
<script>
	 

	export default{
       data(){
       	return {
       		category:{}
       	}
       },
       mounted(){
         this.getCategory();
       },
       methods:{
           getCategory(){
               	 let id = this.$route.params.id;
               
		         let url = `/admin/category/${id}` ;
		         axios.get(url)
		         .then(response=>this.category=response.data)
		         .catch(error);
           },
		deleteCategory(){

			let id = this.$route.params.id;
			let url = `/admin/category/${id}` ;
			axios.delete(url)
			.then(response=>{
				this.$router.push({name:'listCategory'});
				  swal({
				    	        title:'Proces Successfully',
				    	        text: response.data.message,
				    	        icon: response.data.status,
				    	        button:false,
				    	        timer:2000
					        });
			})
			.catch(error);
               
		}
       }
	}
</script>
<style>
	.panel{
		direction: ltr;
	}
</style>
 
