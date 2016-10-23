<template>
    <div id="dashboard">
        <div id="wrapper">
            <div class="container">
                <div id="what" class="page-header col-lg-12 col-md-12 col-sm-12 ">
                    <h1>Welcome {{ username }}.<small> I see this is your first time on the site.  </small></h1>
                    <p>I hope the next couple of steps help you define a strategic approach to developing online tools. Before we get started there are a few details we'll need to setup. It won't take a minute, follow the steps.</p>
                </div>
            </div>
            <addclient v-if="showClient"></addclient>
         
            <addproject v-if="showProject" :onboadring="true"></addproject>
   
            <addbrief v-if="showBrief"></addbrief>
        </div>
    </div>
</template>
<script>
import addclient from './../client/add-client.vue'
import addbrief from './../brief/add-brief.vue'
import addproject from './../project/add-project.vue'
import { incrementCounter } from './../vuex/actions'
    export default{
        name:'Getting-Started',
        data (){
            return {
                showClient:true,
                showProject:false,
                showBrief:false,
                username:'',
            }
        },
        events:{
            'clientAdded': function () {
                this.showClient = false;
                this.showProject = true;
            },
            'projectAdded': function () {
                this.showProject = false;
                this.showBrief = true;

            },
            'briefAdded': function () {
                this.showBrief = false;

            },
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
                this.username = userdetails.data.name;
                });
            },
        }   

    }
</script>
