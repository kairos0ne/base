<template>
    <div class="container">
         <div id="what" class="page-header col-lg-12 col-md-12 col-sm-12 ">
            <h1>Welcome {{ username }}.<small> I see this is your first time on the site.  </small></h1>
             <p>I hope the next couple of steps help you define a strategic approach to developing online tools. Before we get started there are a few details we'll need to setup. It won't take a minute, follow the steps.</p>
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