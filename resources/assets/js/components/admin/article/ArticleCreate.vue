
			<template>

  			<div class="card">

    			<div class="card-header">
    			    <strong>  Add Article New</strong>
    			</div>
    			
          <div class="card-body">
      			
            <form  @submit.prevent="onSubmit" 
                   enctype="multipart/form-data"  >
           
        			<div :class="['form-group',{'has-error':errors.has('title')}]">
          			
                <label for="title" class="control-label">
                   Title : 
                 </label>
          			
                <input type="text" 
                       v-model="article.title"  
                       class="form-control"  
                       placeholder="Enter Title Article .."
          			      
                       name="title"
                       v-validate.continues="'required|min:3|max:191'">
          			<span> Titile is {{lenTitle}} character</span>
               
                <div  v-if="errors.has('title')" 
                      class="help-block alert alert-danger"
                      v-for="error in errors.collect('title')">
                      {{error}}
                </div> 
               
        			
              </div>

        			<div :class="['form-group',{'has-error':errors.has('category')}]">
          			
                <label for="category">Category : </label>
          			
                <select   class="form-control" 
                          multiple
          			          title=" Select Category"
          			          v-model="article.category"
                          name="category" 
                          
                          v-validate.continues="'required'">
          			
            			<option v-for="category in categories" class="tabriz " 
            			        :value="category.id" 
                          v-text="category.name" >
                  </option>

          			</select>

          				 <div  v-if="errors.has('category')" 
                         class="help-block alert alert-danger"
                         v-for="error in errors.collect('category')">
                      {{error}}
                   </div>

        			</div>

        			<div :class="['form-group',{'has-error':errors.has('body')}]">
               
                <label for="body">Body Article:</label>
                
                <textarea  class="form-control ckeditor"  
                           v-model="article.body" 
                           placeholder="Enter Body Article ..." 
                           rows="7"
                           name="body"
                           v-validate.continues="'required|min:5'"
                            > 
               </textarea>

               <div  v-if="errors.has('body')" 
                         class="help-block alert alert-danger"
                         v-for="error in errors.collect('body')">
                      {{error}}
              </div>

              </div>
 
            <div :class="['form-group',{'has-error':errors.has('file')} ]">
      			  
              <label > Photo Article :</label>
      		    <img :src="imgSrc" 
                   @click="selectFile" 
                   width="100" 
                   id="output" >

              <input type="file" 
                       name="file"
                     id="file"  
                     @change="OnSelectedFile"  
                     style="display: none;"
                     v-validate.continues="'required'">


               
               <div  v-if="errors.has('file')" 
                         class="help-block alert alert-danger"
                         v-for="error in errors.collect('file')">
                      {{error}}
              </div>

      			</div>

      			<button type="submit" 
                    class="btn btn-primary btn-sm" 
                     >

                 Send

            </button>
            <router-link class="btn btn-warning btn-sm"
                         :to="'/admin/articles'">
             Cancel
            </router-link>

      			</form>

    			</div>
  			</div>
      </template>

     <!-- script component -->
    <script>
      
     import { Validator } from 'vee-validate';
      const dict = {
      custom: {
        title: {
          required: 'پر کردن فیلد عنوان الزامی هست',
          min: 'تعداد کاراکتر عنوان نباید کمتر از 3 تا باشد',
          max: 'تعداد کاراکتر عنوان نباید بیشتر از 191 تا باشد'
        },
        category: {
          required: 'پر کردن فیلد دسته بندی الزامی هست',
        },
         body: {
          required: 'پر کردن فیلد توضیحات الزامی هست',
          min: 'تعداد کاراکتر توضیحات نباید کمتر از 10 تا باشد',
        },
        file: {
          required: 'پر کردن فیلد تصویر الزامی هست',
        }
      }
    };
    Validator.localize('en', dict);

    	 // class Error{
      //      constructor(){
      //      	this.error={};
      //      }
      //        has(field){
      //         return this.error[field];
      //      }
      //      get(field)
      //      {
      //      	if(this.error[field])
      //         {
      //          return this.error[field][0];
      //        	}
      //      }
      //      	 setErrors(error)
      //        {
      //  			    this.error = error;
      //      	 }
      //      	clear(field){
      //      		delete this.error[field];
      //      	}
      //      	any(){
      //      		return  Object.keys(this.error).length > 0;
      //      	}
    	 // }

  
     
      export default {
         data(){
           	return {
                        categories:[],
                        article:{
                                title:'',
                                category:[],
                                body:'',
                                file:''
                             },
                        error : new Error(),
                        imgSrc:'/image/1.jpg'
                   }
              },

       mounted(){

       	           this.getCategories();
                },

       methods:{
      
             getCategories(){

               axios.get('/admin/categories/list')

                .then(function(response){

                      this.categories = response.data;

                                        }.bind(this))

                .catch(error=>console.log(error));

                            },//end function getCategories
             selectFile(){
                $('#file').click();
             },

         onSubmit(){
         
            this.$validator.validateAll().then(()=>{
               const config =  {
              headers: {
                  'Content-Type': 'multipart/form-data'
              }
           };
             const fd = new FormData();
             fd.append('title',this.article.title);
             fd.append('category',this.article.category);
             fd.append('body',this.article.body);
             fd.append('file',this.article.file);
             const url ='/admin/article';
                   axios.post('/admin/article',fd,config)
                   .then(response=>{
                     swal({
                      title:'Proces Successfully',
                      text: response.data.message,
                      icon: response.data.status,
                      button:false,
                      timer:2000
                  });
                     this.$router.push({name:'listArticle'});
                   })
                   .catch(error=>console.log(response.data));
                 
            });
       },
       OnSelectedFile(event){
         this.article.file = event.target.files[0];
          var reader = new FileReader();
          reader.onload = function(){
          var dataURL = reader.result;
          var output = document.getElementById("output");
          output.src = dataURL;
    };
     reader.readAsDataURL(event.target.files[0]);
   }
       },// end objec methods

   computed:{
        lenTitle(){
          return this.article.title.length;
        }
      }

       // filters:{
       // 	size(value){
       // 		return value.length;
       // 	}
       // },
       // directives:{
       // 	mytext:{
       // 		bind(el,binding,vnode){
       //         el.innerHTML=binding.value;
       // 		}
       // 	}
       //   }

      }

</script>
 
 
 
 
 