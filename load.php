<?php

$link = mysqli_connect("localhost", "root", "", "cateringphp");
$output = '';

if(isset($_POST["name"]))
{
    $fullname = mysqli_real_escape_string($link, $_POST['name']);
    if(!empty($fullname))
    {
        $sql = "SELECT * FROM sh_contact WHERE sh_fullname = '".$_POST["name"]."'";   
    }
    else
    {
        $sql  = "SELECT * FROM sh_contact";
    }
    $res = mysqli_query($link, $sql);
    while($row = mysqli_fetch_array($res))
    {
        $output .='<p class="lead">'.'From: '.$row["sh_fullname"].'('.$row["sh_email"].')'.'</p>';
        //$output .='<p>'.'To: semantic@fake.email.com'.'</p>';
        $output .='<p>'.date("F j, Y", $row["sh_datetime"]).' at '.date("H:i", $row["sh_datetime"]).'</p>'.'<hr>';
        $output .='<p>'.$row["sh_subject"].'</p>';
        
    }
    echo $output;
}
?>
