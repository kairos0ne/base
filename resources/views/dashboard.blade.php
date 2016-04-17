@extends ('layouts.app')
@section('content')
    <div id="wrapper">
        <!-- Start Main Container -->
        <div id="main_content_container" class="container-fluid">
            <colgroup>
                <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-2">
                    <!-- Create a function to favourites -->
                    <div class="list-group">
                        <li  class="list-group-item h4">Clients</li>
                        <li v-for="items in clientList">@{{ items.name }}</li>
                    </div>

                    <!-- End favourites function -->

                </div>
                <div id="content_bar_container" class="col-md-3 col-sm-12 col-lg-3">
                    <ul class="list-group">
                        <li id="project_title" class="list-group-item h4 ">{Projects_label}
                            <a href="{filter}"><span class="fa fa-list fa-pull-right"></a></span>
                            <a href="{filter}"><span class="fa fa-th-large fa-pull-right"></a></span>
                            <a href="{filter}"><span class="fa fa-filter fa-pull-right"></a></span>
                        </li>
                        <li class="project_panel"><a href="#">
                                <p id="project_panel_title">{project title} - {Job Number}<a href="{project_URL}"><span class="fa fa-pencil-square fa-lg fa-pull-right"></a></span></p></a>
                            <p id="project_panel_client">Client: {client}</p>
                            <p id="project_panel_BusUnit">Business Unit: {BusinessUnit}</p>
                            <div id="progress_bar_ID"class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                            <div id="project_panel_jobs_title">
                                <h5>Jobs</h5>
                            </div>
                        </li>
                        <li class="list-group-item"><a href="#"></a>
                            <p>{job_title}<a href="#"></a>
                                <a href="{job_edit_URL}">
                                    <span class="fa fa-pencil fa-pull-right fa-lg"></a></span>
                                <span class="fa fa-laptop fa-pull-right fa-lg"></span>
                            </p>
                        </li>
                        <li class="list-group-item"><a href="#"></a>
                            {job_title}<a href="#"></a>
                            <a href="{job_edit_URL}">
                                <span class="fa fa-pencil fa-pull-right fa-lg"></a></span>
                            <span class="fa fa-laptop fa-pull-right fa-lg"></span>
                        </li>
                    </ul>
                </div>
                <!-- End function for project panels -->
                <div id="content_pane_container" class="col-md-7 col-lg-7 col-sm-12">
                    <div class="panel-group" id="main_content_panel">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#" href="#">
                                        <!-- add dynamic job name-->{project title}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </colgroup>
        </div>
</div>
@endsection