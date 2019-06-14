<template>
    <div>
    
    <div >
        <span>
        <router-link :to="`/admin/article/${article.id}/edit`" 
                     class="btn btn-warning">
                     Edit
                    
                </router-link>
      </span> 

      <span>
        <router-link  to="/admin/articles" 
                      class="btn btn-success">
                      List
              
                </router-link>
      </span>
    </div>
    <p class="float-left">
       {{article.title}}
    
    </p>
 
    <!-- Author -->
    <p class="lead">
        Sending User
        <a href="#" v-text="user.name"></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>
      <span class="glyphicon glyphicon-time">
      
      </span> Send date  {{  article.created_at }}</p>

    <hr>

    <!-- Preview Image -->
 <div class="text-center">
      <img  class=" img-fluid " :src="`/upload/article/${article.image}`" alt="">
 </div>

    <hr>

 
    <p v-text="article.body" class="body">
      
    </p>

 
   
    </div>



   

</template>
<script>
 
    export default {
     data(){
     return {
    
      article :{},
      laravel : window.laravel,
      user    : {}
    }
    },
    created(){
 
      let url =`/admin/article/${this.$route.params.id}?api_token=${window.user.api_token}`;
      axios.get(url)
          .then(response=>{
           
            this.article = response.data;
            this.user = this.article.user;
            delete this.article.user;
          })
          .catch(error=>console.log(error.data));
    },
      
     }
</script>

<style type="text/css">
  .body{
    text-align: justify;
    line-height: 30px;
    font-size: 15px;
  }
</style>

