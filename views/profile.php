<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration form Template | PrepBootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>

        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a></li>
                        <li class="active"><a href="profile.php"> Profile </a></li>
                        <li class="dropdown">

                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <?php
                                echo ucfirst($_SESSION['user']['username']);
                                ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <!-- Profile Edit form -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (isset($_SESSION['Message'])) { ?>
                <div class="alert alert-success">
                    <strong>
                        <?php echo $_SESSION['Message'];
                        unset($_SESSION['Message']);
                        ?>
                    </strong>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
        <div class="well well-sm"><strong><p class="text-center">Profile Edit Page</p></strong></div>
            <form role="form" action="profile_process.php" method="post">
                <fieldset>
                    <legend>Personal Information</legend>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='form-group'>
                                <label for="user_firstname">First name</label>
                                <input class="form-control" id="user_firstname" name="first_name" required="true" size="30" type="text" />
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='form-group'>
                                <label for="user_lastname">Last name</label>
                                <input class="form-control" id="user_lastname" name="last_name" required="true" size="30" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='form-group'>
                                <label for="user_firstname">Father's name</label>
                                <input class="form-control" id="user_firstname" name="father_name" required="true" size="30" type="text" />
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='form-group'>
                                <label for="user_lastname">Mother's name</label>
                                <input class="form-control" id="user_lastname" name="mother_name" required="true" size="30" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="sel1">Select Gender</label>
                              <select class="form-control" name="gender" id="sel1">
                                <option value="0">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group"> <!-- Date input -->
                                <label class="control-label" for="date">Date</label>
                                <input class="form-control" id="date" name="birth_date" placeholder="YYYY-MM-DD" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input class="form-control" name="nationality" placeholder="Nationality" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Religion</label>
                            <input class="form-control" name="religion" placeholder="Religion" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Occupation</label>
                                <input class="form-control" name="occupation" placeholder="Occupation" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Current Work Place</label>
                            <input class="form-control" name="workplace" placeholder="Current Work Place" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Education</label>
                                <input class="form-control" name="education" placeholder="Education" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Marital Status</label>
                            <select name="marital_status" class="form-control">
                                <option value="0">Select</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Blood Group</label>
                            <select name="blood_group" class="form-control">
                                <option value="0">Select</option>
                                <option value="A+">A positive</option>
                                <option value="B+">B positive</option>
                                <option value="AB+">AB positive</option>
                                <option value="O+">O positive</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Height</label>
                                <input class="form-control" name="height" placeholder="Height" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Language:</label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="bengali">Bengali
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="english">English
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="arabic">Arabic
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="hindi">Hindi
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="spanish">Spanish
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Field of Interests:</label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="gardening">Gardening
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="sports">Sports
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="traveling">Traveling
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="music">Music
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="books">Books
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Skilled Area:</label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="programming">Programming
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="networking">Computer Networking
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="mathematics">Mathematics
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="web">Web Development
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="android">Android or IOS Development
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                              <label for="comment">About Yourself:</label>
                              <textarea class="form-control" name="bio" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset> 
                <fieldset>
                    <legend>Contact Information</legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input class="form-control" name="mobile" placeholder="Mobile Number" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Fax Number</label>
                            <input class="form-control" name="fax" placeholder="Fax Number" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>National ID</label>
                                <input class="form-control" name="national" placeholder="National ID" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Passport Number</label>
                            <input class="form-control" name="passport" placeholder="Passport Number" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Website URL</label>
                                <input class="form-control" name="web" placeholder="Website URL" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Address Line One" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Profile Image</legend>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Upload your pic</label>
                                <label class="btn btn-default btn-file">
                                    Browse <input type="file" style="display: none;">
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>" />
                        <input type="submit" id="submit" value="Submit" class="btn btn-info pull-right btn-lg">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
<?php } else {
    $_SESSION['Message'] = "Login for continue";
    header('location:login.php');
} ?>
