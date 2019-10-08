<?php
include 'cfg.php'; //  fichier creer  lors de la 1ere instatlation instalation procesuce en cour de realisation   
//base de donnes 
define('DB_TYPE', 'mysql');
define('DB_HOST', $PARAM_hote);//origine cfg.php
define('DB_NAME', 'sscolaire');
define('DB_USER', 'tibaredha');//'root' creer avant l utilisateur dans mysql dabord
define('DB_PASS', '030570'); //''

//define('msp', 'Ministère de la santé et de la population et de la réforme hospitalière');
define('msp', "Système électronique d'enregistrement des élèves scolarisés ");
define('version', 'v2.0.1-beta1');
define('logod', 'ecole.jpg?t='.time());
define('logo', 'ecole.jpg?t='.time());
define('logon', 'ecole.jpg?t='.time());
define('URL', 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
//define('URL', 'https://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
define('logolab', 'd:\\sscolaire/public/images/logolab/logolab');
define('LIBS', 'libs/');

define('title', '??????');
define('sujet', 'deces');
define('admin', 'admin');
define('sadmin', 'tibaredha');
define('dsp', 'DSP-DJELFA');
define('wilaya','DJELFA');
define('Copyright', '&copy;  Copyright '.date('Y').' Designed by  Dr R.TIBA  - Tél : 07.72.71.80.59  - Email : tibaredha@yahoo.fr  -  DSP Djelfa');
define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
define('path', 'D:\sscolaire\libs\sessions');
define('EDRSFR', "Système électronique d'enregistrement des élèves scolarisés");
define('EDRSUS', 'Electronic Student Health Registration System');


function renemefille ($tiba,$amrane)
 {
       $new_name = dirname(__FILE__)."/".$tiba ;
       $old_name = dirname(__FILE__)."/".$amrane;
      
	   // $old_name = dirname(__FILE__)."/".$tiba;
       // $new_name  = dirname(__FILE__)."/".$amrane;
       
	   if(file_exists($new_name))
        { 
           echo "Error While Renaming $old_name" ;
        }
        else
        {
           if(rename( $old_name, $new_name))
           { 
           echo "Successfully Renamed $old_name to $new_name" ;
           }
          else
          {
           echo "A File With The Same Name Already Exists" ;
          }
        }
 }

// renemefille ("tiba.txt","amrane.txt") ;  



function ajax($id,$tbl,$col,$order)
{
	$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die('I cannot connect to the database because: ' . mysql_error());
	$db = mysql_select_db(DB_NAME);
	mysql_query("SET NAMES 'UTF8' ");
	if($id)
	{
		$sql=mysql_query("select * from $tbl where $col='$id'  order by $order");
		while($row=mysql_fetch_array($sql))
		{
			echo '<option value="'.$row[0].'">'.ucwords($row[1]).'</option>';
		}
	}
}