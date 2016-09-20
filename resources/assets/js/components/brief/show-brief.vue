<template>
    <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
        <ul class="list-group">
            <li id="project_title" class="list-group-item h4 ">{{ currentBrief.overview }}
                <a id="btn-edit" class="btn btn-default btn-xs pull-right" href="#">
                    <i class="fa fa-pencil pull-right"></i>Edit
                </a>
                <a id="btn-complete" class="btn btn-primary btn-xs pull-right" href="#">
                    <i class="fa fa-tick pull-right"></i>Complete
                </a>
            </li>
            <div id="page_content_brief">
                <h4>{{ currentBrief.objective }}</h3>
                    <p>Notes:{{currentBrief.notes}}</p>
            </div>
        </ul>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                currentBrief: {},
                parentProject: {},
                parentClient:{},
                projectID:null,
                clientID:null,
            }
        },
        ready(){
            
        },
        events: {
            'select-brief': function (brief) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
              this.currentBrief = brief; 
              this.projectID = this.currentBrief.project_id;
              this.$http.get('api/get/projects/' + this.projectID).then(function(project){
                this.parentProject = project.data;
                this.clientID = this.parentProject.client_id;
                this.$http.get('api/get/clients/' + this.clientID).then(function(client){
                this.parentClient = client.data;
              });
              });
              
            }
        },
        methods: {

        },

    }
</script>