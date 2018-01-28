<?php require_once "html_output/html_main.php"; ?>
<?php require_once "database_functions/db_fns.php"; ?>
<?php session_start(); ?>
<!DOCTYPE HTML>
<?php
if(!isset($_SESSION['valid_user'])){
    header("Location: error_page/error.php?error_message=You are not authorized to be here!");
}
?>
<html>
<head>
    <title>Classmates</title>
    <!--HEADER-->
    <?php display_header(); ?>
    <!--HEADER-->
    <?php
    $con= db_connect();
    $sql="SELECT * FROM user";
    $result= $con->query($sql);
    ?>
</head>
    <body>
    <!--NAVIGATION-->
    <?php display_nav_bar(); ?>
    <!--NAVIGATION-->

    <!-- Main -->
    <div id="main" class="container">
        <header class="major">
            <h2>All nerds</h2>
            <p><!--PLACEHOLDER--></p>
        </header>
        <div class="row">
            <div class="col-md-2">
                <!--PLACEHOLDER-->
            </div>

            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Photo</td>
                        </tr>
                        <?php
                        while($row= $result->fetch_object()){ ?>
                        <tr>
                            <td><?php echo $row->username; ?></td>
                            <td><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
                            <td><img src="<?php echo $row->user_pic ? 'nerd_pics/'.$row->user_pic : 'PLACEHOLDER/avatar.JPG'; ?>" height="62" width="62" class="img-circle"></td>
                        <tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <div class="col-md-2">
                <!--PLACEHOLDER-->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php display_footer(); ?>
    <!-- Footer -->

    </body>
</html>