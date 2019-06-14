<template>
 
      <div>
            <ul>
              
                 <li v-for="(student,key) in students" v-text="student "></li>
            </ul>
            
                   
                   
            
      </div>
     
</template>

<script>
    export default {
    data(){return { students:[]}}
    ,
    created(){
    axios.get('/students')
            .then(response=>this.students = response.data)
            .catch(error=>console.log(error));
     }
    }
</script>
<style>
   table tr th {
    text-align:center;
    font-family:tahoma;
   }
</style>

