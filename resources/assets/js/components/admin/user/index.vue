<template>
	<div class="card">
		<div class="card-header">
			List User
			<ul
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							
							<th style="width:70px;"
							    @click="sortList('id')">
							    Id
							    <span v-if="sortStatusIcon.id">
							    	<i class="fa fa-arrow-up"
							    	   v-if="sortType">
							    	</i>
							    	<i class="fa fa-arrow-down"
							    	   v-else>
							    	</i>
							    </span>
							</th>
							<th   @click="sortList('name')">
							    Name
							     <span v-if="sortStatusIcon.name">
							    	<i class="fa fa-arrow-up"
							    	   v-if="sortType">
							    	</i>
							    	<i class="fa fa-arrow-down"
							    	   v-else>
							    	</i>
							    </span>
						    </th>
							<th @click="sortList('userName')">
							    UserName
							    <span v-if="sortStatusIcon.userName">
							    	<i class="fa fa-arrow-up"
							    	   v-if="sortType">
							    	</i>
							    	<i class="fa fa-arrow-down"
							    	   v-else>
							    	</i>
							    </span>
						     </th>
							<th @click="sortList('email')">  
								Email
								<span v-if="sortStatusIcon.email">
							    	<i class="fa fa-arrow-up"
							    	   v-if="sortType">
							    	</i>
							    	<i class="fa fa-arrow-down"
							    	   v-else>
							    	</i>
							    </span>
							</th>
							<th @click="sortList('role')">
							   Role
                                  <span v-if="sortStatusIcon.role">
							    	<i class="fa fa-arrow-up"
							    	   v-if="sortType">
							    	</i>
							    	<i class="fa fa-arrow-down"
							    	   v-else>
							    	</i>
							    </span>
						    </th>
							<th style="width:90px;">Action</th>
						</tr>
					</thead>
					<tbody>
						 <tr>
							<td><input type="text" 
								       v-model="q.id"
								       style="width: 100%"
								       @keyup.enter="getUsers()"></td>

							<td><input type="text" 
								       v-model="q.name"
								       style="width: 100%"
								       @keyup.enter="getUsers()"></td>

							<td><input type="text" 
								       v-model="q.userName"
								        @keyup.enter="getUsers()"
								        style="width: 100%"></td>

							<td ><input type="text" 
								       v-model="q.email"
								        @keyup.enter="getUsers()"
								       style="width: 100%"></td>

							<td><input type="text" 
								       v-model="q.role"
								        @keyup.enter="getUsers()"
								       style="width: 100%"></td>
					       <td class="text-center">
								<router-link class="btn btn-success btn-sm"
						                     :to="{name:'addUser'}">
									<i class="fa fa-plus"></i>
							   </router-link>
					       </td>

							
						</tr>
				 
						<tr v-for="user in users">
							<td v-text="user.id"></td>
							<td v-text="user.name"></td>
							<td v-text="user.userName"></td>
							<td v-text="user.email"></td>
							<td v-text="user.role"></td>
							<td>
								<router-link class="btn btn-warning btn-sm"
								              :to="{name:'editUser',params:{id:user.id}}">
					                <i class="fa fa-edit"></i>
							    </router-link>
					            <button class="btn btn-danger btn-sm"
					                     @click="deleteUser(user.id)">
								  <i class="fa fa-remove"></i>
					            </button>
					             
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		<button class="btn btn-success"
		        @click="fetchArticlesPaginate(paginate.prev_page_url)"
		        :disabled="!paginate.prev_page_url">
		    Prev</button>
		    <span class="badge badge-info">page</span>
		    <span class="badge badge-warning">{{paginate.current_page}}</span>
		    <span class="badge badge-info">of</span>
		    <span class="badge badge-warning">{{paginate.last_page}}</span>
		<button class="btn btn-success"
		        @click="fetchArticlesPaginate(paginate.next_page_url)"
		        :disabled="!paginate.next_page_url">
		        Next
		   </button>
		    <span class="badge badge-warning">go</span>
		     <input type="text" style="outline: 0;width: 40px;" 
                    @keyup.enter="goPage()" 
                    v-model="goPageModel">
		</div>
	</div>
</template>
<script>
	export default	{
		data(){
           return {
           	users:[],
           	q:{
           		id:'',
           		name:'',
           		userName:'',
           		email:'',
           		role:'',
           	},
           	paginate:{
           		current_page :'',
          	    last_page    :'',
          	    next_page_url:'',
  	     		prev_page_url:''
           	},
           	goPageModel:'',
           	url:'/admin/user/get',
           	sortType:false,
           	sortStatusIcon :{
		           	'id':true, 
		           	'name':false , 
		            'userName':false ,
		           	'email':false,    
		           	'role':false
           	}    
           }
		},
		mounted(){
           	
           this.getUsers();
		},
		methods:{
          getUsers(){
          	axios.post(this.url,this.q)
          	     .then(response=>{
          	     	this.users = response.data.data;
          	     	this.paginate = {
          	     		current_page :response.data.current_page,
          	     		last_page    :response.data.last_page,
          	     		next_page_url:response.data.next_page_url,
          	     		prev_page_url:response.data.prev_page_url,
          	     	}
          	     })
          	     .catch(error=>console.log(error));
          },
          deleteUser(id){
          	if(!confirm('Are You Sure')){
          		return false;
          	}
          	axios.delete(`/admin/user/${id}`)
          	 .then(response=>{
          	 	    this.getUsers();
          	     	swal({
                      title:'Proces Successfully',
                      text: 'Delete User Successfully',
                      icon: response.data.status,
                      button:false,
                      timer:2000
                  });
          	     })
          	.catch(error=>console.log(error));
          },
          fetchArticlesPaginate(url){
             this.url = url
            this.getUsers();
          },
          goPage(){
          	 this.url = 'admin/user/get?page=' + this.goPageModel;
          	 this.getUsers();
          },
          sortList(field){
          	if(this.sortType){
          	   this.users.sort((a,b)=> a[field] < b[field] ? 1 :-1);
          	}else{
          	   this.users.sort((a,b)=> a[field] > b[field] ? 1 : -1);
          	}
          	this.sortStatusIcon = {
          		    'id':false, 
		           	'name':false , 
		            'userName':false ,
		           	'email':false,    
		           	'role':false
          	};
          	this.sortStatusIcon[field]=true;
          	this.sortType=!this.sortType;
          }
		}
	}
</script>https://www.youtube.com/watch?v=koWj4wfy2QU
<style>
	th{
		cursor: pointer;
	}
</style>https://www.youtube.com/watch?v=xtLLpCE_kRY