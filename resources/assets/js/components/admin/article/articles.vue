<template>
      
        <div class="card">
          <div class="card-header">
             <b>List Artcles</b>
              <router-link to="/admin/article/create/form"  
                           class="btn btn-success btn-sm float-right" >
                  Add
            </router-link>
          </div>

           <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <tr>
              <td colspan="4">
                <input type="text" 
                       v-model="searchTitle" @keyup="getArticles()" 
                       class="form-control"
                       placeholder="Enter Title Article">
              </td>
             
            </tr>
         <tr>

             <th>Title</th>
             <th  style="width: 15%">Send User</th>
             <th  style="width: 15%">Date Send</th>
             <th  style="width: 30%">Action</th>
         </tr>
         <tr v-for="article in articles">

             <td v-text="article.title"> </td>
             <td v-text=" article.user.name "></td>
             <td v-text="article.created_at"></td>
             <td>
                 <router-link :to="{name:'showArticle',params:{id:article.id}}"
                
                              class="btn btn-success btn-sm" >

                    Show
                </router-link>

                <router-link :to="{name:'updateArticle',params:{id:article.id}}" class="btn btn-warning btn-sm"   >
                    EDit
                </router-link>

                   <button  class="btn btn-danger btn-sm" @click="deleteArticle(article.id)">  
                   Delete

                   </button>

 
             </td>
         </tr>
            </table>
        </div>
        <div class="card-footer">
          
           <div class="pagination">
          
          <button class="btn btn-success btn-xs" 
          @click="fetchPaginationArticle(pagination.next_page_url)" 
            :disabled="!pagination.next_page_url">
            Next
          </button>
          <span>Page {{pagination.current_page}} Of {{pagination.last_page}}</span>
          <button class="btn btn-success btn-xs" 
          @click="fetchPaginationArticle(pagination.prev_page_url)" 
            :disabled="!pagination.prev_page_url">
             Previous
          </button>
           </div>
        </div>  

        </div>
             
       


        
       

       

</template>

<script>



    export default {

        data(){
        	return {
          articles:[],
          laravel:window.laravel,
          url:'/admin/articles?api_token=' + user.api_token ,
          pagination:[],
          searchTitle:
          }
        },
        mounted(){
        	this.getArticles();
        },
        computed:{
           lenArticle(){
            return this.articles.length > 0 ;
           },
         },
        methods:{
          getArticles(){
       
              axios.get(  this.url+ '&title=' + this.searchTitle)
              .then(response=>{
                this.articles = response.data.data;
                this.makePagination( response.data);

              })
              .catch(response=>console.log(response.data));
          },
          deleteArticle(slug){
            if(!confirm('آیا مایل به حذف کردن هستید؟')){
              return true;
            }
             axios.delete('/admin/article/' + slug +'?api_token=' + user.api_token)
            .then(response=>{
             this.getArticles();
               swal({
                  title: 'عملیات موفق  ',
                  text: response.data,
                  icon: 'success',
                  button:'Okey'
            });

            })
            .catch(response=>console.log(response.data));
          },
          makePagination(data){
             let pagination={
             current_page :data.current_page,
             last_page    :data.last_page,
             next_page_url:data.next_page_url,
             prev_page_url:data.prev_page_url
             }
             this.pagination = pagination;
          },
          fetchPaginationArticle(url){
             this.url = url + '&api_token=' + user.api_token + '&title=' + this.searchTitle ;
             this.getArticles();
          }
        }
    }


</script>
<style>
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important;
    padding:8px;
    text-align:center;
  }
   .label {
    border: 1px solid #000;
  }

  .table {
    border-collapse: collapse !important;
  }

  .table td,
  .table th {
    background-color: #fff !important;

  }

.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}

.table-hover > tbody > tr:hover {
  background-color: #f5f5f5;
}
 .clear{
        clear: both;
    }
    .page-header{
        margin:0px 0px 0 10px!important;
        border-bottom:0;
    }
</style>
