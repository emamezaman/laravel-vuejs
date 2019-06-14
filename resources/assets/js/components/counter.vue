<template>
    <div>
       <button @click="counter++" class="btn btn-success">{{counter}}</button>
    </div>
</template>

<script>
    export default {
        
        data(){return {counter:0}}
        ,created(){
        	this.counter=1000;
        }
        
    }
</script>

