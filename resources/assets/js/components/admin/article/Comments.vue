<template>

    <div>
    <div class="well">
        <div v-if="laravel.auth">
          
            <h4>ارسال کامنت :</h4>
            <hr>
            <form role="form" action="#" method="post">
            <input type="hidden" name="_token" :value="laravel.token">
                <div class="form-group">
                    <label for="title">متن : </label>
                    <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
        <a v-else href="/register">برای ارسال کامنت حتما باید عضو وبسایت باشید</a>
       

    </div>
             <hr>

    
        <div class="media well" v-for="comment in comments">
            <div class="media-body">
                <h4 class="media-heading">{{ comment.user.name }}
                    <small>ارسال شده در تاریخ  {{  comment.created_at }}</small>
                </h4>
                {{ comment.body }}
            </div>
        </div>
    </div>
        

    
    
</template>

<script>
    export default {

       props:['comments'],
       data(){
        return {
            laravel:window.laravel
        }
    },
    created(){
              
    }
    }

 
</script>


