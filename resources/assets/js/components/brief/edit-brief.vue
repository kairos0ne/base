<template>
    <div id="content_pane_container">
        <form action="" method="POST" role="form">
                <div class="form-group">
                    <ul class="list-group">
                        <li id="project_title_edit" class="">
                            <a id="btn-save" class="btn btn-default btn-xs pull-right" v-on:click="onFormSubmit">
                                <i class="fa fa-pencil pull-right"></i>Save
                            </a>
                            <a id="btn-complete" class="btn btn-primary btn-xs pull-right" href="#">
                                <i class="fa fa-tick pull-right"></i>Complete
                            </a>
                            <input type="text" class="form-control edit_input_style_title " name="name" id="name" v-model="BriefData.overview"  autocomplete="off"/>
                            
                        </li>
                        <div id="page_content_brief_edit">
                            <textarea class="form-control edit_input_style_body" name="description" id="decription" v-model="BriefData.objective" autocomplete="off"></textarea>
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
            BriefData: {
            }, 
            status:null,
            projectID:null,
            ParentProject:{},
        };
    },
     components: {
            
        },
    created(){
    	
    },
     events: {
            'edit-brief': function (brief) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.BriefData = brief; 
                this.clientID = brief.project_id;

                this.$http.get('api/get/projects/' + this.projectID).then(function(project){
                    this.ParentProject = project.data;
                });
            },
        },
    methods: {
        onFormSubmit: function (e) {
            //Prevent default action
            e.preventDefault();
            var request = this.BriefData;
            var id = request.id;
            // add the client to client to a client object on the parent view model
            // send ajax request	
            this.$http.put('/api/put/brief/' + this.BriefData.id, request);
            this.$dispatch('setEditBriefFalse');
            this.$dispatch('setShowBriefTrue');
        },
    }
}
</script>