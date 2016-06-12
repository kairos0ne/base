@extends ('layouts.app')
@section('content')
<div id="dashboard">
    <div id="wrapper">
        <!-- Start Main Container -->
        <div id="main_content_container" class="container-fluid">
            <colgroup>
                <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                    <!-- List Clients  -->
                    <div class="list-group ">
                        <li  class="list-group-item h4">Clients</li>
                        <li class="client_panel" v-for="client in clientList | orderBy 'name'">@{{ client.name }}</li>
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
                                <div id="project_panel_title" @click.prevent="setSelectedProject(project)">@{{ project.name }}<a href="{project_URL}"><span class="fa fa-pencil-square fa-lg fa-pull-right"></a></span></div></a>
                            <p id="project_panel_client">Description: @{{ project.description }}  </p>
                            <p id="project_panel_BusUnit" v-for="client in clientList | clientID project.client_id">Client: @{{ client.name }} | Business Area: @{{ client.business_area}} </p>
                            <div id="progress_bar_ID"class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <div id="brief_panel_title" class="h5">Briefs <i class="fa fa-caret-square-o-up fa-lg fa-pull-right" aria-hidden="true"></i></div>
                            <ul class="list-group">
                                <li v-for="brief in briefList | projectID project.id" 
                                @click.prevent="setSelectedBrief(brief)"> 
                                @{{ brief.overview }}
                                </li >
                            </ul>
                        </li>
                        
                    </ul>
                </div>
                <!-- End function for project panels -->
                <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
                    <h4>Brief</h4>
                    <h3>@{{ currentBrief.overview }}</h3>
                    <h3>@{{ currentBrief.objective }}</h3>
                </div>
            </colgroup>
        </div>
    </div>
</div>
@endsection