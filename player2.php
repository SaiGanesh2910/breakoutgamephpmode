<?php
$score=$_REQUEST['btnClickedValue'];
$time=$_REQUEST['btnClickedValue2'];
$name=$_REQUEST['btnClickedValue3'];
echo "$score";
$con=mysqli_connect('localhost','root','','players');
$query="select *from ranks where PlayerName='$name';";

$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)>0)
{
    $sql="update ranks set Score=$score where PlayerName='$name'; ";
    if(mysqli_query($con,$sql)){
    echo "Score Updated";
    }
    else
    echo "NO";
}
else{
    $sql2="insert into ranks(PlayerName,Score) values('$name',$score); ";
    if(mysqli_query($con,$sql2)>0){
    echo "Your Score is recorded";
    }
    echo "<br><br><br>";
    $tableprintquery="Select PlayerName,Score from ranks order by Score desc;";
    $restab=mysqli_query($con,$tableprintquery);
    if(mysqli_num_rows($restab)>0){
        $x=0;
        $y=-1;
        $prescore=-1;
        echo "<table  cellspacing='0' cellpadding='0' border-spacing='0' style='border:5px solid red;float:left;border-collapse:collapse;margin-left:auto;margin-right:auto; '>";
        echo "<tr> <th style='border:2px solid red;padding:5px;'> Player Name</th> <th style='border:2px solid red;padding:5px;'> Score </th><th style='border:2px solid red;padding:5px;'> Rank </th></tr>";
        while($row = $restab -> fetch_assoc()){
            if($prescore==$y){
                $prescore=$row["Score"];
            }
            elseif($prescore==$row["Score"]){
                echo "<tr><td style='border:2px solid red;text-align:center;padding:5px;'>".$row["PlayerName"]."</td><td style='border:2px solid red;text-align:center;padding:5px;'>".$row["Score"]."</td><td style='border:2px solid red;text-align:center;padding:5px;'>".$x."</td></tr>";
                $prescore==$row["Score"];
            }
            else{
            echo "<tr><td style='border:2px solid red;text-align:center;'>".$row["PlayerName"]."</td><td style='border:2px solid red;text-align:center;'>".$row["Score"]."</td><td style='border:2px solid red;text-align:center;'>".++$x."</td></tr>";
            $prescore=$row["Score"];
           
            }
        }
        echo "</table>";
    }
    else
        echo "0 result";

}
   $con-> close();
    

?>