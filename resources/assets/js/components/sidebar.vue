<template>

   <div>
   	<!-- Blog Search Well -->
<div class="well">
    <h4>جستجو در بلاگ</h4>
    <div class="input-group">
        <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
    </div>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>دسته بندی بلاگ</h4>
    <div class="row">


            <div class="col-lg-6" v-for="row in categories">
                <ul class="list-unstyled">

                        <li v-for="category in row">
                        <router-link :to="`/article/category/${category.name}`" v-text="category.name"></router-link>

                        </li>

                </ul>
            </div>

    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>دیوار ابزار</h4>
    <p>در این بخش میتوانید ابزارهای خود را قرار دهید</p>
</div>
   </div>


</template>

<script>
    export default {
       data(){
         return{categories:[]}
       },
     mounted(){
       axios.get(' /categories/all ')
       .then(response=>this.categories = response.data)
       .catch(response=>console.log(response.data));
     }

    }
</script>
