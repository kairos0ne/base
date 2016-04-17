<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orca</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ HTML::style('css/styles.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">

    <!-- Start Main Container -->
    <div id="main_content_container" class="container-fluid">
        <colgroup>
            <div id="sidebar_container" class="col-md-2 col-sm-12 col-lg-12">
                <!-- Create a function to favourites -->
                <ul class="list-group">
                    <li class="list-group-item"><h4>{favourites_label}</h4></li>
                    <li class="list-group-item"><a href="#">{favourite_link}</a><a href="{project_URL}"><span class="fa fa-star fa-pull-right fa-lg"></a></li>
                </ul>
                <!-- End favourites function -->
                <ul class="list-group">
                    <li class="list-group-item"><h4>{my_projects_label}</h4></li>
                    <li class="list-group-item"><a href="#">{my_projects}</a><a href="{project_URL}"><span class="fa fa-pencil fa-pull-right fa-lg"></a></li>
                </ul>
            </div>
            <div id="content_bar_container" class="col-md-3 col-sm-12 col-lg-12">
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
            <div id="content_pane_container" class="col-md-7 col-lg-12 col-sm-12">
                <div class="panel-group" id="main_content_panel">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#" href="#">
                                    <!-- add dynamic job name-->{project title}
                                </a>
                            </h4>
                        </div>
                        <div id="main-content-panel" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form class="form-group">
                                    <label for="comment">Description:</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                    <label for="comment">Title:</label>
                                    <input class="form-control" id="project_title_form"></input>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </colgroup>
    </div>
    <div id="copywrite">Copyright (c) 2015 Copyright Holder All Rights Reserved.
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript to be added to the scripts.js file located in scripts -->
    <script src="{{ HTML::script('js/script.js') }}"></script>
</body>
</html>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#"></a></li>

            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"></a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
