<html>
    <head>
        <script type='text/javascript'>
        function stime()
        {
            var d= new Date();
            var h=d.getHours();
            var m=d.getMinutes();
            var s=d.getSeconds();
            document.getElementById("txt").innerHTML=h+":"+m+":"+s;
            setTimeout(stime(),1000);
        }
        </script>
    </head>
    <body onload="stime()">
        <br>
        <h1 align="center">Time from local system is: <span id="txt"></span></h1>
    </body>
    <br>
</html>



<?php
date_default_timezone_set('Asia/Kolkata');
$today=date("H:i:s");
?>
<!DOCTYPE html>
<html>
    <body bgcolor="#349" text="white">
        <h1 align="center">
            <?php echo "Time from server is- ".$today;
            ?>
        </h1>
</body>
</html>