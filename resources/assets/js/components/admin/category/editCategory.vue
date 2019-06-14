<template>
	<div>
		<div class="card text-left">
			<div class="card-header">
				 <strong>Edit Category </strong>
			</div>
			<div class="card-body ">

				<form @submit.prevent="updateCategory">
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
						 
					 <router-link class="btn btn-warning btn-sm"
					               :to="{name:'listCategory'}">Cancel</router-link>
					  <button class="btn btn-success btn-sm"
					           type="submit">Update Category</button>
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
       mounted(){
	       this.getCategory();  
       },
       methods:{
       	updateCategory(){
       		this.$validator.validateAll().then(()=>{
       			let id = this.$route.params.id;
       			let url = '/admin/category/' + id;
       			axios.patch(url,this.category)
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
       			     .catch(error=>console.log(error));
       		});
       	},
       	 getCategory(){
               	 let id = this.$route.params.id;
               
		         let url = `/admin/category/${id}/edit`;
		         axios.get(url)
		         .then(response=>this.category=response.data)
		         .catch(error=>console.log(error));
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
	 .loading{
                    display: none;
                    span.icon{
                        height: 30px;width: 30px;border:4px solid red;
                        border-radius: 50%;border-top-color: transparent;
                        display: inline-block;
                        margin-right: 0;
                        animation: load 1s linear infinite;

                    }
                    @keyframes load {
                        0%   {transform: rotate(0deg);}
                        100% {transform: rotate(360deg);}
                    }
                    span{
                       display: inline-block;vertical-align: middle;
                       margin-right: 15px;
                    }
                }
</style>
