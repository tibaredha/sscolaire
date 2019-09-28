<?php
require '../../libs/config.php';

$id=$_POST['id'];
$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db(DB_NAME,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");

$result = mysql_query("SELECT * FROM ecole where id=$id" );
$row=mysql_fetch_object($result);
$resultat=$row->typeecole;

$sql=mysql_query("SELECT * FROM palier WHERE typepalier = $resultat");
while($rowx=mysql_fetch_array($sql))
{
echo '<option value="'.$rowx[0].'">'.$rowx[1].'</option>';
}

?>

