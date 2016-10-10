<template>  
    <div>
        <ul id="list_of_briefs" class="list-group">
            <li class="brief_list_edit">
                <a class="badge_lable">Projects&nbsp;<span class="badge">Total -&nbsp;{{projectList.length}}</span></a><br>
            </li>
            <li class="brief_list" v-for="item in projectList">
                {{item.name}}
            </li>
        </ul>
    </div>
</template>
<script>
export default {

    data(){
        return {
            ClientID:null,
            ClientData:{},
            projectList:[],
            editToggel:true,
            status:'',

        };
    },
    ready(){

    },

     events: {
            'list-projects': function (client) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.ClientData = client; 
                this.ClientID = this.ClientData.id;
                this.$http.get('api/get/projects/' + this.ClientID).then(function(projects){
                    this.prjectList = projects.data;
                });
            },
        },
    methods: {

    },
}
</script>