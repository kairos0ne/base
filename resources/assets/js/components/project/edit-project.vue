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
                            <input type="text" class="form-control edit_input_style_title " name="name" id="name" v-model="ProjectData.name"  autocomplete="off"/>
                            
                        </li>
                        <div id="page_content_brief_edit">
                            <textarea id="resisable" class="form-control edit_input_style_body" name="description" id="decription" v-model="ProjectData.description" autocomplete="off">
                            </textarea>

                                <div class="select_container">
                                    <p>Select your prefered project type and click enter.</p>
                                    <select name="" id="input" class="form-control" required="required" v-model="type"  @click.prevent="setProjectType(type)">
                                        <option v-for="type in types" value="" >{{type}}</option>
                                    </select>
                                </div>

                            <listbrief></listbrief> 
                        </div>
                    </ul> 
                         
                </div> 
                <button type="button" class="btn btn-default" v-on:click="onFormSubmit">Save</button>
        </form>
    </div>
</template>
<script>
import listbrief from '../brief/list-brief.vue'

export default {
    data(){
        return {
            ProjectData: {
            }, 
            ParentClient: {
            },
            clientID:null,
            briefList:[],
            status:null,
            types:[
                'Digital',
                'Print',
                'Packaging',
                'Outdoor',
                'Broadcast',
            ],
            type:null,
        };
    },
     components: {
            listbrief: listbrief,
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
        setProjectType:function (type){
            this.$set(type)
        }
    }
}


</script>