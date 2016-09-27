<template>
<div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <ul class="list-group">
                    <li id="project_title" class="list-group-item h4 ">
                        <input type="text" class="form-control edit_name_project" name="name" id="name" v-model="ProjectData.name"  autocomplete="off"/>
                        <a id="btn-edit" class="btn btn-default btn-xs pull-right" @click.prevent="editSelectedProject(project)">
                            <i class="fa fa-pencil pull-right"></i>Edit
                        </a>
                        <a id="btn-complete" class="btn btn-primary btn-xs pull-right" href="#">
                            <i class="fa fa-tick pull-right"></i>Complete
                        </a>
                    </li>
                    <div id="page_content_brief">
                        <input type="text" class="form-control" name="description" id="decription" v-model="ProjectData.description" autocomplete="off"/>
                    </div>
                </ul>



        
               
                       
                            
                             
                        
            </div>
              
                        <button type="button" class="btn btn-default" v-on:click="onFormSubmit">Save</button>
                   
              
            </form>
    </div>
</template>
<script>
export default {

    data(){
        return {
            ProjectData: {
            }, 
            ParentClient: {
            },
            clientID:null,
            briefList:[],
        };
    },
    created(){
    	
    },
     events: {
            'edit-project': function (project) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.ProjectData = project; 
                this.clientID = project.client_id;
                this.$http.get('api/get/clients/' + this.clientID).then(function(client){
                    this.ParentClient = client.data;
                });
            },
        },

    methods: {
        onFormSubmit: function (e) {
            //Prevent default action
            e.preventDefault();
            var request = this.ProjectData;
            var id = request.id;
            // add the client to client to a client object on the parent view model
            // send ajax request	
            this.$http.put('/api/put/project/' + this.ProjectData.id, request);
            this.$dispatch('setEditProjectFalse');
            this.$dispatch('setShowProjectTrue');
        },
    }
}
</script>