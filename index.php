<?php require_once 'config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Internet Systems Development</title>
    <?php require_once 'head.php'; ?>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-lg-3">
            <?php require_once 'leftnav.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Home</h3>
                </div>
                <div class="panel-body">
                    <div class="jumbotron">
                        <h1>Internet Systems Development</h1>
                        <p>By Tony Ampomah c3351134</p>
                        <p><a class="btn btn-primary btn-lg">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</div>
<?php include 'javascript_link.php'; ?>
</body>
</html>