 <template>
<div id="wrapper">
    <!-- Start Main Container -->
    <div id="main_content_container" class="container-fluid">
        <colgroup>
            <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                <!-- List Clients  -->
                <div class="list-group ">
                    <li  class="list-group-item h4">Clients</li>
                    <li class="client_panel" v-for="client in clientList | orderBy 'name'">{{ client.name }}</li>
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
                        <div id="project_panel_title" @click.prevent="setSelectedProject(project)">{{ project.name }}<a href="{project_URL}"><span class="fa fa-pencil-square fa-lg fa-pull-right"></a></span></div></a>
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
            <!-- End function for project panels -->
            <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
                <ul class="list-group">
                    <li id="project_title" class="list-group-item h4 ">Brief
                        <a class="btn btn-default btn-xs pull-right" href="#">
                            <i class="fa fa-pencil pull-right"></i>Edit
                        </a>
                        <a class="btn btn-default btn-xs pull-right" href="#">
                            <i class="fa fa-tick pull-right"></i>Complete
                        </a>
                    </li>
                    <div id="page_content_brief">
                        <h3>{{ currentBrief.overview }}</h3>
                        <h4>{{ currentBrief.objective }}</h3>
                            <p>Notes:{{currentBrief.notes}}</p>
                    </div>
                </ul>
            </div>
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
                clientList: [],
                projectList: [],
                briefList: [],
                showClient: true,
                showProject: false,
                showBrief: false,

                currentBrief: {
                    id: null,
                    overview: '',
                    objective: '',
                    project_id: null

                },
                currentProject: {
                    id: null,
                    name: '',
                    description: '',
                    client_id: null
                },
                currentClient: {
                    id: null,
                    name: '',
                    business_area: '',
                    user_id: null
                }
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
                this.currentClient = client;
            },
            setSelectedProject: function(project) {
                this.currentProject = project;
            },
            setSelectedBrief: function(brief) {
                this.currentBrief = brief;
            },
        }

    }


</script>