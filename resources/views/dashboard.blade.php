@extends ('layouts.app')
@section('content')
<div id="dashboard">
    <div id="wrapper">
        <!-- Start Main Container -->
        <div id="main_content_container" class="container-fluid">
            <colgroup>
                <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                    <!-- List Clients  -->
                    <div class="list-group">
                        <li  class="list-group-item h4">Clients</li>
                        <li v-for="items in clientList | orderBy 'name'">@{{ items.name }}</li>
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
                                <p id="project_panel_title">@{{ name }}<a href="{project_URL}"><span class="fa fa-pencil-square fa-lg fa-pull-right"></a></span></p></a>
                            <p id="project_panel_client">Client:</p>
                            <p id="project_panel_BusUnit"></p>
                            <div id="progress_bar_ID"class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
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