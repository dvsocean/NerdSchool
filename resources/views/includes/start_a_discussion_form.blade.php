<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <!--PLACEHOLDER-->
        </div>

        <div class="col-xs-12 col-sm-8 col-md-4">
            <h3 align="center">Start a discussion</h3><br>
            <form action="{{url('/posts')}}" method="POST" id="postForm" name="postForm" enctype="multipart/form-data">
                <select id="topic" name="topic">
                    <option value="0">Select a topic &#8681;</option>
                    <option value="Server">Server</option>
                    <option value="Client">Client</option>
                    <option value="Linux">Linux</option>
                    <option value="PHP">PHP</option>
                    <option value="SQL">SQL</option>
                    <option value="Laravel">Laravel</option>
                    <option value="Javascript">Javascript</option>
                    <option value="JQuery">JQuery</option>
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="General">General</option>
                </select><br><br>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4">
            <p>You may attach a JPG, PNG, GIF, SQL, TXT, DOCX, CSS or HTML file</p>
            <input type="file" name="attachment"><br><br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-2">
            <!--PLACEHOLDER-->
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title">
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <label>Date</label><br>
            <input type="text" name="discussion_date" id="datepicker"><br><br>
        </div>

        <div class="col-xs-12 col-md-2">
            <!--PLACEHOLDER-->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-2">
            <p>
                Modify the discussion by
                opening it through the <strong>discussions</strong> page. You may
                also post files or photos.
                <br><br>

                <strong>Note</strong>: words that are part of
                SQL statements will automatically be mis-spelled
                to prevent database issues.
            </p><br>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-8">
            <label>Discussion</label><br>
            <textarea rows="7" name="post" id="post"></textarea><br>
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <input type="hidden" name="posted_by" value="{{$user->name}}">
            <input type="hidden" name="email" value="{{$user->email}}">
            <input type="submit" value="Start Discussion"><br><br>
            </form>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-2">
            <p>
                Your account will be notified when someone
                responds to your thread. Just click the badge
                icon next to your name.
                <br><br>

                You may optionally select to be notified by email.
                Don't forget to checkout the settings page.
            </p>
        </div>
    </div>
</div>