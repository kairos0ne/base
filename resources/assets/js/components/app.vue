<template>
<div id="wrapper">
    <!-- Start Main Container -->
    <div id="main_content_container" class="container-fluid">
        <colgroup>
            <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                <!-- List Clients  -->
                <listclient></listclient>
                <!-- List Favorites -->
            </div>
            <div id="content_bar_container" class="col-md-3 col-sm-12 col-lg-3">
                <!-- Main Content Bar Filter  -->
                <projectpanels></projectpanels>
            </div>
            <!-- Start Brief Rest Components -->
            <showbrief v-show='showBrief'></showbrief>
            <!-- Start Rest Project Components -->
            <showproject v-show='showProject' ></showproject>
            <!-- Start Client Rest Components -->
            <showclient v-show='showClient' ></showclient>
            <!-- Start edit project -->
            <editproject v-show='editProject'></editproject>
            <!-- Start edit Client --> 
            <editclient v-show='editClient'></editclient>
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
    import projectpanels from './project/project-panels.vue'

    export default {
        name: 'dashboard',
        data(){
            return {
                user: null,
                userRole:null,
                userGroup:null,
                team:null,
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
            projectpanels: projectpanels,
            // Brief Components
            addbrief: addbrief,
            showbrief:showbrief,
            editbrief: editbrief,
            listbrief: listbrief,

        },
        ready() {
            
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
            'update-client-rest': function (client){
                this.setSelectedClient(client);
            },
            'update-brief-rest': function (brief){
                this.setSelectedBrief(brief);
            },
            'update-project-rest': function (project){
                this.setSelectedProject(project);
            },
        },
        methods: {
            // Insert main application methods here 
            setSelectedClient: function(client) {
                this.$broadcast('select-client', client);
                this.$broadcast('edit-client', client);
                this.$broadcast('list-projects', client);
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
            },
            setSelectedProject: function(project) {
                this.$broadcast('select-project', project);
                this.$broadcast('edit-project', project);
                this.$broadcast('list-briefs', project);
                this.showBrief = false;
                this.showProject = true;
                this.showClient = false;
                this.editProject = false;
                this.editClient = false; 
                this.editBrief = false; 
                this.listBrief = true; 
                this.listClient = false; 
                this.listProject = false;
            },
            setSelectedBrief: function(brief) {
                this.$broadcast('select-brief', brief);
                this.$broadcast('edit-brief', brief);
                this.showBrief = true;
                this.showProject = false;
                this.showClient = false;
                this.editProject = false;
                this.editClient = false; 
                this.editBrief = false; 
                this.listClient = false; 
                this.listProject = false; 
                this.listBrief = false; 
            },
        },
    }

</script>