<script>
    $(function(){
       $('[title]').tooltip();
    });
</script>

<!-- Footer -->
<footer id="footer">
    <div class="inner">
        <ul class="icons">
            <li><a href="https://github.com/dvsocean/nerdschool" class="icon alt fa-github" title="See the code for NerdSchool"><span class="label">Github</span></a></li>
            <li><a href="https://www.linkedin.com/in/daniel-ocean-4ab9918a/" class="icon alt fa fa-linkedin" title="Review the developers Linkedin account"><span class="label">Instagram</span></a></li>
            <li><a href="mailto:dvsocean@icloud.com" class="icon alt fa-envelope" title="Send us an email!"><span class="label">Email</span></a></li>
        </ul>
    </div>
    <p class="copyright">&copy; Nerdschool, Walnut, CA</p>
</footer>
</div>



<!-- Scripts -->
<script src="{{asset('js/scriptsmix.js')}}"></script>
<!-- Scripts -->

<!-- BOOTSTRAP JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- BOOTSTRAP JS-->

<!--JQUERY UI MUST BE AFTER BOOTSTRAP.JS-->
@include('includes.jquery-ui')
<!--JQUERY UI MUST BE AFTER BOOTSTRAP.JS-->