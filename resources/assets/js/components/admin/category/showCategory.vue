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
            	<li class="list-group-item">
            		<label>Slug : </label>{{category.slug}}
            	</li>
            	<li class="list-group-item">
            		<label>Create Time : </label>{{category.created_at}}
            	</li>
            	<li class="list-group-item">
            		<label>Update Time : </label>{{category.updated_at}}
            	</li>
            </ul>
			

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
               
		         let url = '/admin/category/'+ id;
		         axios.get(url)
		         .then(response=>this.category=response.data)
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
 
