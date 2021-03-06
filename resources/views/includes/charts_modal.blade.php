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
                    <h5 class="modal_bottom">Posts</h5>
                    <h6><?php echo $user->posts->count() ? $user->posts->count() : 'You have not created any posts'; ?></h6>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h5 class="modal_bottom">Comments</h5>
                    <h6><?php echo $user->singles->count() ? $user->singles->count() : 'You have not commented on a post'; ?></h6>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h5 class="modal_bottom">Files</h5>
                    <h6><?php echo $user->files->count() ? $user->files->count() : 'You have not uploaded any files'; ?></h6>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-4" align="center">
                    <h5 class="modal_bottom">Notify</h5>
                    <h6><?php  echo $user->additionals->count() ? $user->additionals->count() : 'You have not joined any discussions'; ?></h6>
                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="center">
                    <h5 class="modal_bottom">Server</h5>
                    <h6><?php  echo $user->server->count() ? $user->server->count() : 'You have not uploaded any files to your server'; ?></h6>
                </div>
            </div>
            <!--HTML SETUP-->
            <br><br>
            <!--BUTTONS-->
            <div class="row" align="right">
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4">

                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4">

                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-4" align="right">
                    @if(!Auth::user()->accepted_by)
                        <p>Share your project on our sever..</p>
                        <a href="{{url('/verify')}}" class="btn btn-success">Get verified</a>
                    @else
                        <a href="{{url('/nerdserver')}}" class="button special">Nerd Server</a>
                        <br><br>
                        <a href="{{url('/live')}}" class="button">Upload Files</a>
                    @endif
                </div>
            </div>
            <!--BUTTONS-->

        </div>
    </div>
</div>
<!--MODAL-->