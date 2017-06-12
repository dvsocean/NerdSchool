<script>
    $(function(){
        var post= $('#single_post');

        $('#sp_form').submit(function(e){
            if($("#single_post").val().length < 3){
                alert('Body must contain at least 3 characters to be considered a post');
                e.preventDefault();
            }

            if(post.val().search("SELECT") >= 0){
                textString= post.val().replace(/SELECT/g, "SELxCT");
                document.sp_form.single_post.value= textString;
            }

            if(post.val().search("select") >= 0){
                textString= post.val().replace(/select/g, "selXct");
                document.sp_form.single_post.value= textString;
            }

            if(post.val().search("INSERT") >= 0){
                textString= post.val().replace(/INSERT/g, "INSxRT");
                document.sp_form.single_post.value= textString;
            }

            if(post.val().search("insert") >= 0){
                textString= post.val().replace(/insert/g, "insXrt");
                document.sp_form.single_post.value= textString;
            }

            if(post.val().search("UPDATE") >= 0){
                textString= post.val().replace(/UPDATE/g, "UPDxTE");
                document.sp_form.single_post.value= textString;
            }

            if(post.val().search("update") >= 0){
                textString= post.val().replace(/update/g, "updXte");
                document.sp_form.single_post.value= textString;
            }

            if(post.val().indexOf("*") >= 0){
                textString= post.val().replace(/\*/g, 'x');
                document.sp_form.single_post.value= textString;
            }

            if($("#myFile")[0].files[0].size > 4000000){
                alert("FILE TOO BIG, LIMIT 4MB");
                e.preventDefault();
            }
        });
    });
</script>