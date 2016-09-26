<template>
    <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
        <ul class="list-group">
            <li id="project_title" class="list-group-item h4 ">{{ project.name }}
                <a id="btn-edit" class="btn btn-default btn-xs pull-right" @click.prevent="editSelectedProject(project)">
                    <i class="fa fa-pencil pull-right"></i>Edit
                </a>
                <a id="btn-complete" class="btn btn-primary btn-xs pull-right" href="#">
                    <i class="fa fa-tick pull-right"></i>Complete
                </a>
            </li>
            <div id="page_content_brief">
                <p>{{ project.description }}</p>
            </div>
        </ul>
        <h4>Briefs</h4>
        <ul class="list-group">
            <li id="brief_list" v-for="brief in briefList | briefsForProject this.project.id">
            <p>{{ brief.overview }}</p> 
            </li>
        </ul>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                project: {},
                parentClient:{},
                briefList:[],
                clientID:null,
                projectID:null,
            }
        },
        events: {
            'select-project': function (project) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.project = project; 
                this.clientID = this.project.client_id;
                this.$http.get('api/get/clients/' + this.clientID).then(function(client){
                    this.parentClient = client.data;
                });
                this.$http.get('api/get/briefs').then(function(briefs){
                    this.briefList = briefs.data;
                });
            },
        },
        methods:{
            editSelectedProject: function(project){
                this.$dispatch('setShowProjectFalse');
                this.$dispatch('set-edit-project', project);
                this.$dispatch('setEditProjectTrue');
            },
        }

    }
</script>