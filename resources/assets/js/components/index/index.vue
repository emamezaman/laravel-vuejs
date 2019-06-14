<template>
	<div>
		<h1>List Articles</h1>
		<div class="row">
			<div class="col-md-6"
		      v-for="article in articles">
			<h3 v-text="article.title"></h3>
			<img :src="article.image" class="img-fluid">
			<p v-text="article.body"></p>
		</div>
		</div>
	</div>
</template>
<script>
	export default{
		data(){
           return {
           	articles:[]
           }
		},
		mounted(){
          this.getArticles();
		},
		methods:{
          getArticles(){
          	axios.get(`/articles`)
          .then(response=>{
          	console.log(response.data);
          	this.articles = response.data;
           alert(JSON.stringify(this.articles));
          })
          .catch(error=>console.log(error));
          }
		}
	}
</script>