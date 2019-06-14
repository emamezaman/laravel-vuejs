<template>
 
      <div>
           <ul class="list-group">
           <li class="list-group-item" v-for="user in users">
             {{user}}
           </li>
       </ul>
      </div>
     
</template>

<script>
    export default {
    data(){return { users:[]}}
    ,
    created(){
    axios.get('/users')
            .then(response=>this.users = response.data)
            .catch(error=>console.log(error));
     }
    }
</script>

