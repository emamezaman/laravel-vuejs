<template>
	<div>
		<div class="card   ">
			<div class="card-header">
				 <strong>List Category </strong>
				 <router-link class="btn btn-success btn-sm float-right "
             				  :to="{name:'createCategory'}">
             					Add Category
             					<i class="glyphicon glyphicon-plus"></i>
             	</router-link>

			</div>
			<div class="card-body ">
             <div class="table-responsive-sm table-responsive-md">
           
             <table class="table table-bordered table-striped table-hover">
             	<thead class="thead-dark">
                <tr>
                  <td colspan="3">
                    <input type="text" 
                           @keyup.enter="getResults()" 
                           class="form-control"
                           v-model="q"
                           placeholder="Enter Category Name and Press Enter">
                  </td>
                </tr>
             		<tr>

             			<th>Index</th>
             			<th>Name Category 

                      <span class="btn btn-success btn-xs" @click="sortCats('name')">
                        <i  
                           v-if="typeSort"
                           title="Asendig">Asendig</i>
                        <i 
                           v-else
                           title="Desendig">Desendig</i>

                      </span>

                    </th>
             			<th>Action</th>
             		</tr>
             	</thead>
             		<tbody>
             		
             		<tr v-for="(category,index) in categories.data">
             			<td>{{index+1}}</td>
             			<td>{{category.name}}</td>
             			<td>
             				<router-link class="btn btn-warning btn-sm"
             				             :to="{name:'editCategory',params:{id:category.id}}">
             					Edit
             				</router-link>
             				<router-link class="btn btn-primary btn-sm"
             				             :to="{name:'showCategory',params:{id:category.id}}">
             					Show
             				</router-link>
             				<router-link class="btn btn-danger btn-sm"
             				             :to="{name:'deleteCategory',params:{id:category.id}}">
             					Delete
             				</router-link>
             			</td>
             		</tr>
             			
             		</tbody>
                
             </table>
               </div>
			 <div class="text-right">
          <pagination :data="categories" 
                       @pagination-change-page="getResults"
                       number="false">
                          <span slot="prev-nav"> Previous</span>
                          <span slot="next-nav">Next </span>
                       </pagination>
       </div>

				 

			</div>
		</div>
	</div>
</template>
<script>
	 

	export default{
       data(){
       	return {
          q:'', 
       		categories:[],
          typeSort:true,
       	}
       },
       mounted(){
         this. getResults();
       },
       methods:{
        sortCats(field){
          if(this.typeSort){
           this.categories.data.sort((a,b)=>   `${a}.${field}` +  `${b}.${field}` ? -1 : 1);
          }else{
            this.categories.data.sort((a,b)=>  a[field] > b[field] ? -1 : 1);
          
          }
          this.typeSort = !this.typeSort;
        },
        getResults(page = 1) {
                axios.get('/admin/categories?page=' + page +'&q=' + this.q)
                .then(response => {
                  this.categories = response.data;
                });
    }
       }
	}
</script>
<style >
	
	.red{
		color: red;
	}

</style>
