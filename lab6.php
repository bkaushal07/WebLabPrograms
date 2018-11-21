<?php
$file="count.txt";
$count=strval(file_get_contents($file));
$count+=1;
file_put_contents($file,$count);
echo "you are visitor no." .$count;
?>