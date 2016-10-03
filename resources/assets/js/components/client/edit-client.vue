<template>
    <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
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
                            <input type="text" class="form-control edit_input_style_title " name="name" id="name" v-model="ClientData.name"  autocomplete="off"/>
                            
                        </li>
                        <div id="page_content_brief_edit">
                            <textarea class="form-control edit_input_style_body" name="description" id="decription" v-model="ClientData.business_area" autocomplete="off"></textarea>
                        </div>
                    </ul> 
                </div> 
                <button type="button" class="btn btn-default" v-on:click="onFormSubmit">Save</button>
        </form>
    </div>
</template>
<script>
    import listproject from '../project/list-project.vue'
export default {

    data(){
        return {
            ClientData: {
            }, 
            projectList:[],
            briefList:[],
            status:null,
        };
    },
     components: {
            listproject: listproject,
        },
    created(){
    	
    },
     events: {
            'edit-client': function (client) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.ClientData = client; 
                this.clientID = ClientData.id;
                this.$http.get('api/get/clients/' + this.clientID).then(function(client){
                    this.ParentClient = client.data;
                });
            },
        },
    methods: {
        onFormSubmit: function (e) {
            //Prevent default action
            e.preventDefault();
            var request = this.ClientData;
            var id = request.id;
            // add the client to client to a client object on the parent view model
            // send ajax request	
            this.$http.put('/api/put/client/' + this.ClientData.id, request);
            this.$dispatch('setEditClientFalse');
            this.$dispatch('setShowClientTrue');
        },
    }
}
</script>