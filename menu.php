<head>

    <!-- Custom links -->
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">




    <!-- CDN links -->

    <!-- Latest compiled and minified CSS -->


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>







</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

</head>
<body>

<nav class="my-navbar navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Ask-Me</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="mn-menu nav navbar-nav">
                <li class="active"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#" class="glyphicon glyphicon-bell"> Notifications</i></a></li>


            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-center">
                <li>
                <button type="button" name="add" id="add" data-toggle="modal"
                        data-target="#add_data_Modal" class="btn btn-default" style=" margin-top: 10px; margin-left: 320px;  background: #d0d0d0" ;>Ask Question</button>
                </li>
            </ul>




            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">  <span class="glyphicon glyphicon-eye-open"></span> View Profile</a></li>
                        <li><a href="settings.php">  <span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

</body>
</html>


