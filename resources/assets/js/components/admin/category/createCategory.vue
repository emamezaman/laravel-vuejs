<template>
	<div>
		<div class="card text-left ">
			<div class="card-header ">
				 <strong >Add Category </strong>
			</div>
			<div class="card-body ">

				<form @submit.prevent="createCategory">
					<div class="form-group">
						<label>  <b>Name</b> 
							<span class="red">*</span></label>
						<input type="text" 
						       name="name" 
						       class="form-control"
						       placeholder="Enter Category Name"
						       v-model="category.name"
						       v-validate="'required|min:2|max:10'">
						       <div class="help-block alert alert-danger"
						            v-if="errors.has('name')">
						       	  {{errors.first('name')}}
						       </div>
					</div>

					<div class="form-group">
						 
					  <router-link class="btn btn-warning btn-md"
					               :to="{name:'listCategory'}">Cancel</router-link>
					  <button class="btn btn-success btn-md">Save Category</button>
					</div>

				</form>

			</div>
		</div>
	</div>
</template>
<script>
	 import { Validator } from 'vee-validate';
      const dict = {
      custom: {
        name: {
          required: 'پر کردن فیلد عنوان الزامی هست',
          min: 'تعداد کاراکتر عنوان نباید کمتر از 2 تا باشد',
          max: 'تعداد کاراکتر عنوان نباید بیشتر از 10 تا باشد'
        }
      }
    };
    Validator.localize('en', dict);

	export default{
       data(){
       	return {

       		category:{

       			name:''
       		}
       	}
       },
       methods:{
       	createCategory(){
       		this.$validator.validateAll().then(()=>{
       			let url = '/admin/category';
       			axios.post(url,this.category)
       			     .then(response=>{
       			     	this.category = {name:''};
       			     	   swal({
				    	        title:'Proces Successfully',
				    	        text: response.data.message,
				    	        icon: response.data.status,
				    	        button:false,
				    	        timer:2000
					        });
       			     	   this.$router.push({name:'listCategory'});
       			     })
       			     .catch(error=>console.log(error.data));
       		});
       	}
       
       }
	}
</script>
<style scoped>
	input{
		direction: ltr;
        color:gray;
	}
	.red{
		color: red;
	}
</style>
