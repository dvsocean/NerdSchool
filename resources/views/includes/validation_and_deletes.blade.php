<script>
    $(function(){
        var topicSelect= $('#topic');
        var titleSelect= $('#title');
        var textAreaSelect= $('#post');

        <!--DELETE NERD CONFIRM-->
        $('.desNerd').click(function(e){
            if(!confirm('Are you sure you want to delete?')){
                e.preventDefault();
            }
        });
        <!--DELETE NERD CONFIRM-->

        $('#postForm').submit(function(e){
            if(topicSelect.val() < 1){
                alert('Please select a topic');
                e.preventDefault();
            }

            if(titleSelect.val().length < 3 || titleSelect.val().length > 50){
                alert('Title must be between 3 and 50 characters long');
                e.preventDefault();
            }

            if(textAreaSelect.val().length < 10){
                alert('Your post must be at least 10 characters long');
                e.preventDefault();
            }
        });

        $('#datepicker').datepicker();
        $('#datepicker').datepicker('setDate', new Date());


        $('#postForm').submit(function(e){

            if(textAreaSelect.val().search("SELECT") >= 0){
                textString= textAreaSelect.val().replace(/SELECT/g, "SELxCT");
                document.postForm.post.value= textString;
            }

            if(textAreaSelect.val().search("select") >= 0){
                textString= textAreaSelect.val().replace(/select/g, "selXct");
                document.postForm.post.value= textString;
            }

            if(textAreaSelect.val().search("INSERT") >= 0){
                textString= textAreaSelect.val().replace(/INSERT/g, "INSxRT");
                document.postForm.post.value= textString;
            }

            if(textAreaSelect.val().search("insert") >= 0){
                textString= textAreaSelect.val().replace(/insert/g, "insXrt");
                document.postForm.post.value= textString;
            }

            if(textAreaSelect.val().search("UPDATE") >= 0){
                textString= textAreaSelect.val().replace(/UPDATE/g, "UPDxTE");
                document.postForm.post.value= textString;
            }

            if(textAreaSelect.val().search("update") >= 0){
                textString= textAreaSelect.val().replace(/update/g, "updXte");
                document.postForm.post.value= textString;
            }

            if(textAreaSelect.val().indexOf("*") >= 0){
                textString= textAreaSelect.val().replace(/\*/g, 'x');
                document.postForm.post.value= textString;
            }
        });
    });
</script>


