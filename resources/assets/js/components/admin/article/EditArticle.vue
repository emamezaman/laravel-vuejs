
<template>

		<div class="card">

    		<div class="card-header">
    		   {{title}}
    		</div>

		<div class="card-body">

		 <form @submit.prevent="onSubmit()" 
           enctype="multipart/form-data"
           id="formEdit"
           method="post"
           novalidate>
     
		   
       <div :class="['form-group']">

		     <label for="title"> Title Article : </label>

		     <input type="text" 
                v-model="article.title"  
                class="form-control"  
                placeholder="Please Enter Title Article ...  "
                name="title"
                 v-validate.continues="'required|min:3|max:191'">
                <span> Titile is {{lenTitle}} character</span>
               
                <div  v-if="errors.has('title')" 
                      class="help-block alert alert-danger"
                      v-for="error in errors.collect('title')">
                      {{error}}
                </div> 
		            <!-- @keydown="errors.clear('title')"  -->

      	<!-- 	<div v-if="errors.has('title')" class="red">

      			 {{errors.get('title')}}

      		</div> -->

		</div>

		<div :class="['form-group']">

		   <label for="category">Category : </label>
		   
       <select   class="form-control " 
                 multiple
		             title=" Please Select Category ..."
		             v-model="article.category" 
                 name="category"
                  v-validate.continues="'required'">
               <!--   @change="errors.clear('category')" -->
		
            		<option v-for="category in categories"
            		        :value="category.id" 
                        v-text="category.name" >
                </option>

		 </select>

      <div  v-if="errors.has('category')" 
                         class="help-block alert alert-danger"
                         v-for="error in errors.collect('category')">
                      {{error}}
                   </div>


    <!-- <div  v-if="errors.has('category')" 
          class="red">
       
       {{errors.get('category')}}

     </div> -->

		</div>

		<div :class="['form-group']">
		    
        <label for="body">Body Article:</label>
		    
        <textarea  class="form-control"  
                   v-model="article.body" 
                   placeholder="Enter text Article Body" 
                   rows="7"
                   name="body"
                   v-validate.continues="'required|min:5'"> </textarea>

                   <div  v-if="errors.has('body')" 
                         class="help-block alert alert-danger"
                         v-for="error in errors.collect('body')">
                      {{error}}
              </div>
		            <!--    @keydown="errors.clear('body')" -->

        <!-- <div v-if="errors.has('body')" class="red">
        
            {{errors.get('body')}}
        
        </div> -->
		
    </div>

      <div :class="['form-group' ]">
      
         <label >  Image Article :</label>

         <img v-if="article.file"
                :src="`/upload/article/${article.file}`" 
                @click="selectFile" 
                width="100" 
                id="output" >

      <img v-else 
           :src="imgSrc" 
           @click="selectFile" 
           width="100" 
           id="output" >

      <input type="file" 
             id="file"
             @change="OnSelectedFile"  
             style="display: none;"
             name="file"
              v-validate.continues="'required'">

             <div  v-if="errors.has('file')" 
                         class="help-block alert alert-danger"
                         v-for="error in errors.collect('file')">
                      {{error}}
              </div>
       
      <!--  <div v-if="errors.has('file')" 
            class="red">

          {{errors.get('file')}}

       </div> -->

    </div>
  <!-- :disabled="errors.any()" -->
		<button type="submit" 
            class="btn btn-warning"  > Edit Article   </button>
            <router-link   class="btn btn-primary"
                           :to="{name:'listArticle'}">
                           Cancel   </router-link>

		</form>

		</div>

		</div>

		</template>



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
 
    

// or use the instance method

    // class Error{

    // constructor(){
    // 	this.errors = {};
    // }

    //  has(field){
    //  return  this.errors.hasOwnProperty(field);
    // }

    // get(field){
    // 	if(this.errors[field]){
    //      return this.errors[field][0];
    // 	}
    // }
    // 	 setErrors(errors){
    // 	    this.errors = errors;
    // 	}
    // 	clear(field){
    // 		delete this.errors[field];
    // 	}
    // 	any(){
    // 		return  Object.keys(this.errors).length > 0;
    // 	}
    // }

export default {

     data(){
         	return {
              categories:[],
              article:{
                  title:'',
                  category:'',
                  body:'',
                  file:''
              },
              //errors : new Error(),
              imgSrc:'image/1.jpg',
              title:'Edit Article',
              urlGetCategories:'/categories/list',
              idArticle:this.$route.params.id,
              urlGetArticle:`/admin/article/${this.idArticle}/edit`,
              urlUpdateArticle:`/admin/article/${this.idArticle}`
        }
     },

 mounted(){

     this.getCategories();
     this.getArticle();

 },

 methods:{

    getCategories(){
             axios.get(this.urlGetCategories)
            .then((response)=>this.categories = response.data);
    },

	 getArticle(){
    
      		 axios.get(this.urlUpdateArticlel)
      		 .then((response)=>{
               let cats = [];
      			   for (var i = 0; i <response.data.categories.length; i++) {
      				   cats[i]=response.data.categories[i].id;
      			   }
      		 this.article = { 
              title    : response.data.title,
              category : cats,
              body     : response.data.body,
              file     : response.data.image,
      		 };
           });

         
	 },
                  

       
 onSubmit(){

    const config =  {
      headers: {
          'Content-Type': 'multipart/form-data'
      }
   };

     const fd = new FormData();

      fd.append('title',this.article.title);
      fd.append('body',this.article.body);
      fd.append('category',this.article.category);
      fd.append('file',this.article.file);
      fd.append('_method','patch');
        
    axios.post(this.urlUpdateArticle,fd)
      .then(response=>{
          swal({
    	        title:'Procces Successfully',
    	        text: response.data.message,
    	        icon: response.data.status,
    	        button:false,
    	        timer:2000
        });
        this.$router.push({name:'listArticle'});
       });
       
 },

  selectFile(){
        $('#file').click();
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
 },
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
