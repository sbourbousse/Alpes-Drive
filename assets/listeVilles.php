<?php
include_once "connect.php";

$cur=$maBase->query("SELECT * FROM cp WHERE codePostalCP like '".$_GET['cp']."%' order by nomCP");

while ($uneVille=$cur->fetch_assoc())
{
    echo "<option value='".$uneVille['nomCP']."'>".$uneVille['nomCP']."</option>";
}

?>