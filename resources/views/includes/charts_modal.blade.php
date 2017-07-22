<!--MODAL-->
<div class="modal fade stats" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--CHART-->
            <div id="piechart"></div>
            <!--CHART-->

            <!--HTML SETUP-->
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h6 class="modal_bottom">Posts</h6>
                    <h1><?php echo $user->posts->count(); ?></h1>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h6 class="modal_bottom">Comments</h6>
                    <h1><?php echo $user->singles->count(); ?></h1>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h6 class="modal_bottom">Files</h6>
                    <h1><?php echo $user->files->count(); ?></h1>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-4" align="center">
                    <h6 class="modal_bottom">Notify</h6>
                    <h1><?php  echo $user->additionals->count(); ?></h1>
                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h6 class="modal_bottom">Server</h6>
                    <h1><?php  echo $user->server->count(); ?></h1>
                </div>
            </div>
            <!--HTML SETUP-->
            <br><br>
            <!--BUTTONS-->
            <div class="row">
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4">

                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4">

                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4">
                    @if(!Auth::user()->accepted_by)
                        <p>View your project on our sever..</p>
                        <a href="{{url('/verify')}}" class="btn btn-success">Get verified</a>
                    @else
                        <a href="{{url('/nerdserver')}}" class="btn btn-success">Nerd Server</a>

                        <a href="{{url('/live')}}" class="btn btn-success">Upload Files</a>
                    @endif
                </div>
            </div>
            <!--BUTTONS-->

        </div>
    </div>
</div>
<!--MODAL-->