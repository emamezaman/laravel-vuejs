<template>
	<div class="card">
		<div class="card-header">
			Edit User Form
		</div>
		<div class="card-body">
			<form @submit.prevent="updateUser()">
			<div class="mb-3 row">
				<label class="col-sm-2">Name</label>
				<div class="col-sm-10">
					<input type="text" 
					       name="name"
					       class="form-control"
					       v-model="user.name">
				</div>
			</div>

			<div class="mb-3 row">
				<label class="col-md-2">UserName</label>
				<div class="col-md-10">
					<input type="text" 
					       name="userName"
					       class="form-control"
					       v-model="user.userName">
				</div>
			</div>


		<div class="mb-3 row">
				<label class="col-md-2">Email Address</label>
				<div class="col-md-10">
					<input type="email" 
					       name="email"
					       class="form-control"
					       v-model="user.email">
				</div>
		</div>

		<div class="mb-3 row">
				<label class="col-md-2">Role</label>
				<div class="col-md-10">
					<select name="role"
					        class="form-control"
           					v-model="user.role">
       					<option value="admin">Admin</option>
       					<option value="user">User</option>
       					<option value="author">Author</option>
					</select>
				</div>
		</div>

		<div class="mb-3 row">
				<label class="col-md-2">Password </label>
				<div class="col-md-10">
					<input type="password" 
					       name="password"
					       class="form-control"
					       v-model="user.password">
				</div>
		</div>

		<div class="mb-3 row">
			<label class="col-sm-2"></label>
			<div class="col-md-10">
				<input type="submit" 
			       value="Update User" 
			       class="btn btn-warning btn-block">
			</div>
		</div>
      </form>
		</div>

		</div>	
	</div>
</template>

<script>
	export default{
		data(){
			return{
				user:{
					name:'',
					userName:'',
					email:'',
					role:'',
					password:''
				}
			}
		},
		mounted(){
			this.getUser();
		}
		,
		methods:{
			updateUser(){
				axios.patch('/admin/user/'+this.$route.params.id,this.user)
				.then(response=>{
				    this.$router.push({name:'listUser'});
				})
				.catch(error=>console.log(error));
			},
			getUser(){
				axios.get('/admin/user/'+this.$route.params.id+'/edit')
					.then(response=>{
						this.user = response.data;
			})
			.catch(error=>console.log(error));
			}
		}
	}
</script>