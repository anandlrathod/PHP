<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       echo "hello";
        ?>
    </body>
</html>-->
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#dSuggest").keyup(function() {
        var dInput = $(this).val();
        //alert(dInput);
        //$(".dDimension:contains('" + dInput + "')").css("display","block");
        $.ajax({
    type    : 'POST',
    url     : 'data/posts.php',
    data    : ({key:dInput}),
    success : function(response) {
//        alert("response");
      alert(response);
      $('#response').text('name : ' + response);
   
           }    
});
    });
});

</script>
 
</head>
<body>
//<?php
//       echo "hello";
//        ?>
<input type="text" value="" id="dSuggest" />
 <div id='response'></div>
</body>
</html>