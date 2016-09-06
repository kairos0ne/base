<template>
    <div id="dashboard">
        <div id="wrapper">
            <div class="container">
                <div id="what" class="page-header col-lg-12 col-md-12 col-sm-12 ">
                    <h1>Welcome {{ user.name }}.<small> I see this is your first time on the site.  </small></h1>
                    <p>I hope the next couple of steps help you define a strategic approach to developing online tools. Before we get started there are a few details we'll need to setup. It won't take a minute, follow the steps.</p>
                </div>
            </div>
            <addclient v-if="showClient"></addclient>
         
            <addproject v-if="showProject"></addproject>
   
            <addbrief v-if="showBrief"></addbrief>
        </div>
    </div>
</template>
<script>
import addclient from './../client/add-client.vue'
import addbrief from './../brief/add-brief.vue'
import addproject from './../project/add-project.vue'
    export default{
        data (){
            return {
                formData:[],
                user: {},
                clientList:[],
                projectList:[],
                briefList:[],
                showClient:true,
                showProject:false,
                showBrief:false,
                currentClient:{},
                currentProject:{},
                currentBrief:{},
            }
        },
        components:{
            addclient:addclient,
            addbrief:addbrief,
            addproject:addproject,
        },
        ready(){
            this.getUser();
        },
        methods: {
            getUser: function () {
                this.$http.get('/api/get/user').then(function (userdetails) {
                this.user = userdetails.data;
                });
            },
        }   

    }
</script>
