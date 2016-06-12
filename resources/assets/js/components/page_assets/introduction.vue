<template>
    <div class="container">
        <h2 class="survey col-lg-offset-2 col-lg-8 col-md-8 col-sm-12">Welcome {{ username }}. I see this is your first time on the site. I hope the next couple of steps help you define a strategic approach to developing online tools. Before we get started there are a few details we'll need to setup. It won't take a minute, follow the steps.</h2>
    </div>
</template>
<script>
    export default {
        
        data (){
            return {}
        },
        props:[
            'username'
        ]
            //Some method here

    }
</script>