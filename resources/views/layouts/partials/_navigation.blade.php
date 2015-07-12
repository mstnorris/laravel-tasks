<div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Laravel Tasks</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if ( auth()->check() )
            <ul class="nav navbar-nav">
                <li><a href="/tasks"><i class="fa fa-fw fa-plus"></i> New</a></li>
                <li><a href="/tasks"><i class="fa fa-fw fa-tasks"></i> All</a></li>
                <li><a href="/completed"><i class="fa fa-fw fa-check"></i> Completed</a></li>
                <li><a href="/trash"><i class="fa fa-fw fa-trash"></i> Trash</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-user"></i> {{ auth()->user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tasks/create"><i class="fa fa-fw fa-plus"></i> New</a></li>
                        <li><a href="/tasks"><i class="fa fa-fw fa-tasks"></i> All</a></li>
                        <li><a href="/completed"><i class="fa fa-fw fa-check"></i> Completed</a></li>
                        <li><a href="/trash"><i class="fa fa-fw fa-trash"></i> Trash</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-fw fa-sign-out"></i> Sign out</a></li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"><i class="fa fa-fw fa-user-plus"></i> Sign Up</a></li>
                <li><a href="/login"><i class="fa fa-fw fa-sign-in"></i> Sign in</a></li>
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</nav>
    </div>
</div>