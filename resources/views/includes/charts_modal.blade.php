<!--MODAL-->
<div class="modal fade stats" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--CHART-->
            <div id="piechart"></div>
            <!--CHART-->

            <!--HTML SETUP-->
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-2 col-md-2" align="center">
                    <h6 class="modal_bottom">Posts</h6>
                    <h1><?php echo $user->posts->count(); ?></h1>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2" align="center">
                    <h6 class="modal_bottom">Comments</h6>
                    <h1><?php echo $user->singles->count(); ?></h1>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2" align="center">
                    <h6 class="modal_bottom">Files</h6>
                    <h1><?php echo $user->files->count(); ?></h1>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-2" align="center">
                    <h6 class="modal_bottom">Notify</h6>
                    <h1><?php  echo $user->additionals->count(); ?></h1>
                </div>

                <div class="col-xs-6 col-sm-2 col-md-2" align="center">
                    <h6 class="modal_bottom">Server</h6>
                    <h1><?php  echo $user->server->count(); ?></h1>
                </div>
            </div>
            <!--HTML SETUP-->

        </div>
    </div>
</div>
<!--MODAL-->