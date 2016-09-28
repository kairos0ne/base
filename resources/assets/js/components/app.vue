<template>
<div id="wrapper">
    <!-- Start Main Container -->
    <div id="main_content_container" class="container-fluid">
        <colgroup>
            <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                <!-- List Clients  -->
                <div class="list-group ">
                    <li  class="list-group-item h4">Clients</li>
                    <li @click.prevent="setSelectedClient(client)" class="client_panel" v-for="client in clientList | orderBy 'name'">{{ client.name }}</li>
                </div>
                <!-- End favourites function -->

            </div>
            <div id="content_bar_container" class="col-md-3 col-sm-12 col-lg-3">
                <ul class="list-group">
                    <li id="project_title" class="list-group-item h4 ">Projects
                        <a href="{filter}"><span class="fa fa-list fa-pull-right"></a></span>
                        <a href="{filter}"><span class="fa fa-th-large fa-pull-right"></a></span>
                        <a href="{filter}"><span class="fa fa-filter fa-pull-right"></a></span>
                    </li>

                    <li v-for="project in projectList" class="project_panel"><a href="#">
                        <div id="project_panel_title" @click.prevent="setSelectedProject(project)">{{ project.name }}<a><span class="fa fa-pencil-square fa-lg fa-pull-right"></a></span></div></a>
                        <p id="project_panel_client">Description: {{ project.description }}  </p>
                        <p id="project_panel_BusUnit" v-for="client in clientList | clientID project.client_id">Client: {{ client.name }} | Business Area: {{ client.business_area}} </p>
                        <div id="progress_bar_ID"class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                        <hr>
                        <div id="brief_panel_title" class="h5">Briefs <i class="fa fa-caret-square-o-up fa-lg fa-pull-right" aria-hidden="true" data-toggle="collapse" data-target="#briefs"></i></div>
                        <ul id="briefs" class="list-group">
                            <li id="briefItem" v-for="brief in briefList | projectID project.id"
                                @click.prevent="setSelectedBrief(brief)">
                                {{ brief.overview }}
                            </li >
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- Start Brief Rest Components -->
            <showbrief v-show='showBrief'></showbrief>
            <!-- Start Rest Project Components -->
            <showproject v-show='showProject'></showproject>
            <!-- Start Client Rest Components -->
            <showclient v-show='showClient'></showclient>
            <!-- Start edit project -->
            <editproject v-show='editProject'></editproject>
            <!-- Start edit Client --> 
            <editclient v-show='editclient'></editclient>
            <!-- Start edit Brief  -->
            <editbrief v-show='editBrief'></editbrief>


        </colgroup>
    </div>
</div>

</template>

<script>

    // Brief - resources/assets/js/components/brief
    import addbrief from './brief/add-brief.vue'
    import showbrief from './brief/show-brief.vue'
    import editbrief from './brief/edit-brief.vue'
    import listbrief from './brief/list-brief.vue'

    // Client - resources/assets/js/components/client
    import addclient from './client/add-client.vue'
    import showclient from './client/show-client.vue'
    import editclient from './client/edit-client.vue'
    import listclient from './client/list-client.vue'

    // Project - recourses/js/components/project
    import addproject from './project/add-project.vue'
    import showproject from './project/show-project.vue'
    import editproject from './project/edit-project.vue'
    import listproject from './project/list-project.vue'

    export default {
        data(){
            return {
                formData: [],
                user: null,
                userRole:null,
                userGroup:null,
                team:null,
                clientList: [],
                projectList: [],
                briefList: [],
                showClient: false,
                showProject: false,
                showBrief: false,
                editProject:false,
                editBrief:false,
                editClient:false,
                listProject:false,
                listClient:false,
                listBrief:false,

            };
        },
        components: {
            // Client Components
            addclient: addclient,
            showclient: showclient,
            editclient: editclient,
            listclient: listclient,
            // Project Components
            addproject: addproject,
            showproject: showproject,
            editproject: editproject,
            listproject: listproject,
            // Brief Components
            addbrief: addbrief,
            showbrief:showbrief,
            editbrief: editbrief,
            listbrief: listbrief,

        },
        ready() {
            this.getDashboardData();
        },
        events: {
            'setEditProjectFalse': function () {
              // Set the edit project value to false
                this.editProject = false;    
            },
            'setEditBriefFalse': function () {
              // Set the edit project value to false
                this.editBrief = false;    
            },
            'setEditClientFalse': function () {
              // Set the edit project value to false
                this.editClient = false;    
            },
            'setShowProjectFalse': function () {
              // Set the edit project value to false
                this.showProject = false;    
            },
            'setShowBriefFalse': function () {
              // Set the edit project value to false
                this.showBrief = false;    
            },
            'setShowClientFalse': function () {
              // Set the edit project value to false
                this.showClient = false;    
            },
            'setListProjectFalse': function () {
              // Set the edit project value to false
                this.listProject = false;    
            },
            'setListBriefFalse': function () {
              // Set the edit project value to false
                this.listBrief = false;    
            },
            'setListClientFalse': function () {
              // Set the edit project value to false
                this.listClient = false;    
            },
            // Start true funtions 
            'setEditProjectTrue': function () {
              // Set the edit project value to false
                this.editProject = true;    
            },
            'setEditBriefTrue': function () {
              // Set the edit project value to false
                this.editBrief = true;    
            },
            'setEditClientTrue': function () {
              // Set the edit project value to false
                this.editClient = true;    
            },
            'setShowProjectTrue': function () {
              // Set the edit project value to false
                this.showProject = true;    
            },
            'setShowBriefTrue': function () {
              // Set the edit project value to false
                this.showBrief = true;    
            },
            'setShowClientTrue': function () {
              // Set the edit project value to false
                this.showClient = true;    
            },
            'setListProjectTrue': function () {
              // Set the edit project value to false
                this.listProject = true;    
            },
            'setListBriefTrue': function () {
              // Set the edit project value to false
                this.listBrief = true;    
            },
            'setListClientTrue': function () {
              // Set the edit project value to false
                this.listClient = true;    
            },
            'set-edit-project': function (project){
                this.setSelectedProject(project);
            },

        },
        methods: {
            getDashboardData: function () {
                this.$http.get('/api/get/clients').then(function(clients){
                    this.clientList = clients.data;
                });
                this.$http.get('/api/get/projects').then(function (projects) {
                    this.projectList = projects.data;
                });
                this.$http.get('/api/get/briefs').then(function (briefs) {
                    this.briefList = briefs.data;
                })
            },
            setSelectedClient: function(client) {
                this.showBrief = false;
                this.showProject = false;
                this.showClient = true;
                this.editProject = false;
                this.editProject = false;
                this.editClient = false;
                this.editBrief = false;  
                this.listProject = true;
                this.listBrief = false;
                this.listClient = false; 
                this.$broadcast('select-client', client);
                this.$broadcast('edit-client', client);
                this.$broadcast('list-projects', client);
            },
            setSelectedProject: function(project) {
                this.showBrief = false;
                this.showProject = true;
                this.showClient = false;
                this.editProject = false;
                this.editClient = false; 
                this.editBrief = false; 
                this.listBrief = true; 
                this.listClient = false; 
                this.listProject = false;
                this.$broadcast('select-project', project);
                this.$broadcast('edit-project', project);
                this.$broadcast('list-briefs', project);
            },
            setSelectedBrief: function(brief) {
                this.showBrief = true;
                this.showProject = false;
                this.showClient = false;
                this.editProject = false;
                this.editClient = false; 
                this.editBrief = false; 
                this.listClient = false; 
                this.listProject = false; 
                this.listBrief = false; 
                this.$broadcast('select-brief', brief);
            },
        }

    }


</script>