@if(Auth::user())
<!DOCTYPE HTML>
<html>
<head>
    <title>Verify</title>
    @include('includes.header')
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!--NAV BAR-->
@include('includes.navbar')
<!--NAV BAR-->



        <br><br>
        <br><br>

        <!-- Main -->
        <section id="main" class="">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm- 12 col-md-3 col-lg-12">
                        <!--PLACEHOLDER-->
                    </div>

                    <div class="col-xs-12 col-sm- 12 col-md-6 col-lg-12">
                        <h5>In order to upload pages to our live server you must accept the following conditions.<br><br>
                            <ul>
                                <li>You may not upload code that will pose a threat or cause harm to our servers or to other users.</li>
                                <li>Your code can only contain links to other uploaded pages.</li>
                                <li>Your code will not be accepted if these rules are not followed and your account will be deleted.</li>
                                <li>Students are admonished that it is their responsibility to read code before executing.</li>
                                <br><br>
                                <li><strong>ALL CODE IS SUBJECT FOR REVIEW</strong></li>
                            </ul>
                        </h5>
                    </div>

                    <div class="col-xs-12 col-sm- 12 col-md-3 col-lg-12">
                        <!--PLACEHOLDER-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm- 12 col-md-4 col-lg-12">
                        <!--PLACEHOLDER-->
                    </div>

                    <div class="col-xs-12 col-sm- 12 col-md-4 col-lg-12">
                        <br><br>
                        <form action="{{url('/accept_terms')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="agreement" value="{{ucfirst(Auth::user()->name)}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="submit" value="Accept">
                        </form>
                        <h5>By clicking "Accept" you are signing off that all uploaded code is written by you and you will not
                            hold Nerdschool responsible.</h5>
                    </div>

                    <div class="col-xs-12 col-sm- 12 col-md-4 col-lg-12">
                        <!--PLACEHOLDER-->
                    </div>
                </div>
            </div>
        </section>
<br><br>
<br><br>
@include('includes.footer')
</body>
</html>

@else
    @include('includes.error')
@endif