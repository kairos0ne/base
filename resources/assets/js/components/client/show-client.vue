<template>
    <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
        <ul class="list-group">
            <li id="project_title" class="list-group-item h4 ">{{ currentClient.name }}
                <a id="btn-edit" class="btn btn-default btn-xs pull-right" @click.prevent="editClient">
                    <i class="fa fa-pencil pull-right"></i>Edit
                </a>
                <a id="btn-complete" class="btn btn-primary btn-xs pull-right" href="#">
                    <i class="fa fa-tick pull-right"></i>Complete
                </a>
                <a class="badge_lable"><span class="badge">Projects -&nbsp;{{projectList.length}}</span></a><br>
            </li>
            <div id="page_content_brief">
                <h4>{{ currentClient.business_area }}</h3>
            </div>
        </ul>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                currentClient: {},
                ClientID:null,
                projectList:[],
            }
        },
        events: {
            'select-client': function (client) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
              this.currentClient = client; 
              this.ClientID = this.currentClient.id;
              this.$http.get('api/get/projects/' + this.ClientID).then(function(projects){
                this.projectList = projects.data;
              });
            }
        },
        methods:{
            editClient: function(){
                this.$dispatch('setShowClientFalse');
                this.$dispatch('setEditClientTrue');
            },

        },

    }
</script>