<!DOCTYPE html>
<html>
    <head>
        <style>
            table,td,th
            {
                border: 1px Solid black;
                width: 33%;
                text-align: center;
                border-collapse:collapse;
                background-color:lightBlue;
            }
            table
            {
                margin: auto; 
            }
        </style>
    </head>
    <body>
        <?php
        $servername="localhost";
        $username="root";
        $pass="";
        $db="lab10";
        $a=[];
        $conn=mysqli_connect($servername,$username,$pass,$db);
        $sql= "SELECT * FROM student";
        $result=$conn->query($sql);
        if($conn->connect_error)
        {
            die("Connection failed".$conn->connect_error);
        }
        echo "<center>Before sorting</center>";
        echo "<table><tr><th>USN</th><th>Name</th><th>Address</th></tr>";
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                echo "<tr><td>".$row["usn"]."</td>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["address"]."</td></tr>";
                array_push($a,$row["usn"]);
            }
        }
        else
            echo "Table is empty";
        echo "</table>";
        $n=count($a);
        $b=$a;
        for($i=0;$i<($n-1);$i++)
        {
            $pos=$i;
            for($j=$i+1;$j<$n;$j++)
            {
                if($a[$pos]>$a[$j])
                    $pos=$j;
            }
            if($pos!=$i)
            {
                $temp=$a[$i];
                $a[$i]=$a[$pos];
                $a[$pos]=$temp;
            }
        }
        $c=[];
        $d=[];
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                for($i=0;$i<$n;$i++)
                {
                    if($row["usn"]==$a[$i])
                    {
                        $c[$i]=$row["name"];
                        $d[$i]=$row["address"];
                    }
                }
            }
        }
        echo "<br><center>After sorting</center>";
        echo "<table><tr><th>USN</th><th>Name</th><th>Address</th></tr>";
        for($i=0;$i<$n;$i++)
        {
            echo "<tr><td>".$a[$i]."</td>";
            echo "<td>".$c[$i]."</td>";
            echo "<td>".$d[$i]."</td></tr>";
        }
        echo "</table>";
        $conn->close();
        ?>
        </body>
        </html>