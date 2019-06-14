<template>
<h2>Profile {{ user.name}}</h2>
</template>

<script>
export default {
     data(){
        	return {
                  user :window.user

        	}
        },
}
</script>