<template>
    <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
        <ul id="show_project_list" class="list-group ">
            <li id="project_title" class="list-group-item h4 ">{{ ProjectData.name }}
                <a id="btn-edit" class="btn btn-default btn-xs pull-right" @click.prevent="editSelectedProject(ProjectData)">
                    <i class="fa fa-pencil pull-right"></i>Edit
                </a>
                <a id="btn-complete" class="btn btn-primary btn-xs pull-right" href="#">
                    <i class="fa fa-tick pull-right"></i>Complete
                </a>
                 <a class="badge_lable"><span class="badge"><i class="fa fa-book" ></i>&nbsp;Briefs -&nbsp;{{briefList.length}}</span></a>
                    
                 <br>
            </li>
            <div id="page_content_brief">
                <p>{{ ProjectData.description }}</p>
            </div>
        </ul>
        <listbrief></listbrief> 
    </div>
</template>
<script>
    
    import listbrief from '../brief/list-brief.vue'

    export default{
        data(){
            return{
                ProjectData: {},
                parentClient:{},
                clientID:null,
                projectID:null,
                briefList:[],
            }
        },
        components: {
            listbrief: listbrief,
        },

        events: {
            'select-project': function (project) {
              // `this` in event callbacks are automatically bound
              // to the instance that registered it
                this.ProjectData = project; 
                this.clientID = this.ProjectData.client_id;
                this.$http.get('api/get/client/' + this.clientID).then(function(client){
                    this.parentClient = client.data;
                });
                this.$http.get('api/get/briefs/' + this.ProjectData.id).then(function(briefs){
                    this.briefList = briefs.data;
                });
            },
        },
        methods: {
            editSelectedProject: function(){
                this.$dispatch('setShowProjectFalse');
                this.$dispatch('setEditProjectTrue');
            },
        }

    }
</script>