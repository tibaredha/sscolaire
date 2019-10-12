<style>
#inner-grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr  ;
  grid-template-rows: 33px 33px 33px 33px 33px 33px 33px 33px 33px 33px;
  grid-gap: 5px;padding: 5px;
}


#a {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 1 / 2;color: white;}#a1 {background: salmon;text-align: center; border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 1 / 2;}
#b {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 2 / 3;color: white;}#b1 {background: salmon;text-align: left;   border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 2 / 3;color: white;}
#c {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 3 / 4;color: white;}#c1 {background: salmon;text-align: left;   border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 3 / 4;color: white;}
#d {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 4 / 5;color: white;}#d1 {background: salmon;text-align: left;   border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 4 / 5;color: white;}
#e {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 5 / 6;color: white;}#e1 {background: salmon;text-align: left;   border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 5 / 6;color: white;}
#f {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 6 / 7;color: white;}#f1 {background: salmon;text-align: left;   border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 6 / 7;color: white;}
#g {background: salmon;text-align: left;border-radius: 5px;padding: 5px;grid-column: 1  / 4;  grid-row: 7 / 8;color: white;}#g1 {background: salmon;text-align: left;   border-radius: 5px;padding: 0px;grid-column: 4  / 6;  grid-row: 7 / 8;color: white;}
#h {background: salmon;text-align: left;border-radius: 5px;padding: 0px;grid-column: 1  / 6;  grid-row: 8 / 9;}


#a2 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 6  / 19;  grid-row: 1 / 2;color: white;}
#b2 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 6  / 19;  grid-row: 2 / 3;color: white;}

#c2 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 3 / 4;color: white;}
#c3 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 3 / 4;color: white;}
#c4 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 3 / 4;color: white;}
#c5 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 3 / 4;color: white;}
#c6 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 3 / 4;color: white;}
#c7 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 3 / 4;color: white;}
#c8 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 3 / 4;color: white;}

#d20 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 4 / 5;color: white;}
#d30 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 4 / 5;color: white;}
#d40 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 4 / 5;color: white;}
#d50 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 4 / 5;color: white;}
#d60 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 4 / 5;color: white;}
#d70 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 4 / 5;color: white;}
#d80 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 4 / 5;color: white;}

#d21 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 5 / 6;color: white;}
#d31 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 5 / 6;color: white;}
#d41 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 5 / 6;color: white;}
#d51 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 5 / 6;color: white;}
#d61 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 5 / 6;color: white;}
#d71 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 5 / 6;color: white;}
#d81 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 5 / 6;color: white;}

#d22 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 6 / 7;color: white;}
#d32 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 6 / 7;color: white;}
#d42 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 6/ 7;color: white;}
#d52 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 6 / 7;color: white;}
#d62 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 6 / 7;color: white;}
#d72 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 6 / 7;color: white;}
#d82 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 6 / 7;color: white;}


#d23 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 7 / 8;color: white;}
#d33 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 7 / 8;color: white;}
#d43 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 7/ 8;color: white;}
#d53 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 7 / 8;color: white;}
#d63 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 7 / 8;color: white;}
#d73 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 7 / 8;color: white;}
#d83 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 7 / 8;color: white;}

#d24 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 8 / 9;color: white;}
#d34 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 8 / 9;color: white;}
#d44 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 8/ 9;color: white;}
#d54 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 8 / 9;color: white;}
#d64 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 8 / 9;color: white;}
#d74 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 8 / 9;color: white;}
#d84 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 8 / 9;color: white;}


#d25 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 9 / 10;color: white;}
#d35 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 9 / 10;color: white;}
#d45 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 9/ 10;color: white;}
#d55 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 9 / 10;color: white;}
#d65 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 9 / 10;color: white;}
#d75 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 9 / 10;color: white;}
#d85 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 9 / 10;color: white;}

#d26 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 10 / 11;color: white;}
#d36 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 14;  grid-row: 10 / 11;color: white;}
#d46 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 14  / 15;  grid-row: 10 / 11;color: white;}
#d56 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 15  / 16;  grid-row: 10 / 11;color: white;}
#d66 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 16  / 17;  grid-row: 10 / 11;color: white;}
#d76 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 10 / 11;color: white;}
#d86 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 10 / 11;color: white;}

#e2 {background: salmon;text-align: left; border-radius: 5px;padding: 5px;grid-column: 6  / 13;  grid-row: 11 / 12;color: white;}
#e3 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 13  / 17;  grid-row: 11 / 12;color: white;}

#e7 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 17  / 18;  grid-row: 11 / 12;color: white;}
#e8 {background: salmon;text-align: center; border-radius: 5px;padding: 5px;grid-column: 18  / 19;  grid-row: 11 / 12;color: white;}



.med {background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%;}
#date{background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%;}
#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}

</style>


<div class="sheader1l"><p id="dashboard">Ordonnance</p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l"><P><?php echo "Élève scolarisé : ".$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].'('.$this->user[0]['FILSDE'].')';?> <?php //echo ;?><?php //echo $this->user[0]['id'];?></P><?php $ctrl='rds';?></div>
<div class="sheader2r">MSPRH<?php?></div>
<?php
echo '<div class="listl">';
echo'<form  action="'.URL.$ctrl.'/ajouterArticle/" method="post">';
echo '<div id="inner-grid">';
echo '<div id="a">Produit DCI</div>';         echo '<div id="a1">';html::medicamentx("libelleProduit","","Choisir un produit");echo '</div>';                     
echo '<div id="b">Dose / presentation</div>'; echo '<div id="b1">';echo '<input  class ="med" type="text" name="doseparprise"       value="1"/></div>';
echo '<div id="c">Nbr/jours</div>';           echo '<div id="c1">';echo '<input  class ="med" type="text" name="nbrdrfoisparjours"  value="1"/></div>';
echo '<div id="d">Durée en Jours</div>';      echo '<div id="d1">';echo '<input  class ="med" type="text" name="nbrdejours"         value="10"/></div>';
echo '<div id="e">NBR de boites</div>';       echo '<div id="e1">';echo '<input  class ="med" type="text" name="qteProduit"         value="1"/></div>';
echo '<div id="f">Prix/boite</div>';          echo '<div id="f1">';echo '<input  class ="med" type="text" name="prixProduit"        value="1"/></div>';
echo '<div id="g">Date préscription</div>';   echo '<div id="g1">';echo '<input  class ="med"  id="date"  type="text" name="DATE"   value="'.date('d-m-Y').'"/></div>';
echo '<input  type="hidden" name="id"  value="'.$this->user[0]['id'].'"/>';
echo '<input  type="hidden" name="STR" value="'.Session::get('structure').'"/>';

echo '<div id="h"><input id="dd" onclick="playSound()"  type="submit" value="Envoyer"/> </div>'; 

echo '<div id="a2">';echo 'Votre Ordonnance (max 05 medicaments) </div>';
echo '<div id="b2">';echo '<a href="'.URL.'emg/search/0/10?o=IDELEVE&q='.$this->user[0]['id'].'">'.$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' </a></div>';
echo '<div id="c2">';echo 'Libellé</div>';echo '<div id="c3">';echo 'Dose</div>';echo '<div id="c4">';echo 'Nbr</div>';echo '<div id="c5">';echo 'Jours</div>';echo '<div id="c6">';echo 'Quantite</div>';echo '<div id="c7">';echo 'Prix</div>';echo '<div id="c8">';echo 'Action</div>';
echo '<div id="d20">';echo '</div>'; echo '<div id="d30">';echo '</div>'; echo '<div id="d40">';echo '</div>';echo '<div id="d50">';echo '</div>';echo '<div id="d60">';echo '</div>';echo '<div id="d70">';echo '</div>';echo '<div id="d80">';echo '</div>';
echo '<div id="d21">';echo '</div>'; echo '<div id="d31">';echo '</div>'; echo '<div id="d41">';echo '</div>';echo '<div id="d51">';echo '</div>';echo '<div id="d61">';echo '</div>';echo '<div id="d71">';echo '</div>';echo '<div id="d81">';echo '</div>';
echo '<div id="d22">';echo '</div>'; echo '<div id="d32">';echo '</div>'; echo '<div id="d42">';echo '</div>';echo '<div id="d52">';echo '</div>';echo '<div id="d62">';echo '</div>';echo '<div id="d72">';echo '</div>';echo '<div id="d82">';echo '</div>';
echo '<div id="d23">';echo '</div>'; echo '<div id="d33">';echo '</div>'; echo '<div id="d43">';echo '</div>';echo '<div id="d53">';echo '</div>';echo '<div id="d63">';echo '</div>';echo '<div id="d73">';echo '</div>';echo '<div id="d83">';echo '</div>';
echo '<div id="d24">';echo '</div>'; echo '<div id="d34">';echo '</div>'; echo '<div id="d44">';echo '</div>';echo '<div id="d54">';echo '</div>';echo '<div id="d64">';echo '</div>';echo '<div id="d74">';echo '</div>';echo '<div id="d84">';echo '</div>';
echo '<div id="d25">';echo '</div>'; echo '<div id="d35">';echo '</div>'; echo '<div id="d45">';echo '</div>';echo '<div id="d55">';echo '</div>';echo '<div id="d65">';echo '</div>';echo '<div id="d75">';echo '</div>';echo '<div id="d85">';echo '</div>';
echo '<div id="d26">';echo '</div>'; echo '<div id="d36">';echo '</div>'; echo '<div id="d46">';echo '</div>';echo '<div id="d56">';echo '</div>';echo '<div id="d66">';echo '</div>';echo '<div id="d76">';echo '</div>';echo '<div id="d86">';echo '</div>';

if ( rds::creationPanier() )
{
      $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	  if ( $nbArticles <= 7  )
	  {
		   for ($i=0 ;$i < $nbArticles ; $i++)
		   {
		   echo '<div id="d2'.$i.'">';echo ($i+1) .'-'. View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'dci').'  '.View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre');echo '</div>';
		   echo '<div id="d3'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i]);echo '</div>';
		   echo '<div id="d4'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i]);echo '</div>';
		   echo '<div id="d5'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i]);echo '</div>';
		   echo '<div id="d6'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i]);echo '</div>';
		   echo '<div id="d7'.$i.'">';echo htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i]);echo '</div>';
		   echo '<div id="d8'.$i.'">';echo "<a href=\"".URL."rds/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\">X</a>" ;echo '</div>';  
		   }
      }

}
echo '<div id="e2">';echo 'Nombre total de medicament : '.rds::compterArticles().'</div>';
echo '<div id="e3">';echo '<a href="'.URL.'rds/supprimePanier/'.$this->user[0]['id'].'">Annuler</a>';echo '</div>';
// echo '<div id="e4">';echo 'Nbr</div>';
// echo '<div id="e5">';echo 'Jours</div>';
// echo '<div id="e6">';echo 'Quantite</div>';
echo '<div id="e7">';echo rds::MontantGlobal().'</div>';
echo '<div id="e8">';echo '<a href="'.URL.'tcpdf/rds/ord.php?uc='.$this->user[0]['id'].'">Imprimer</a>';echo '</div>';

echo '</div>';
echo'</form>';



$x=450;
$y=370;
echo "<div  style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo"<table width='97%' border='1' cellpadding='5' cellspacing='1' align='left'>";
// echo"<tr><th colspan=\"7\">Votre Ordonnance (max 07 medicaments) </th></th>";echo"<tr>";
// echo"<tr>";
// echo'<th colspan="7"><a href="'.URL.'emg/search/0/10?o=IDELEVE&q='.$this->user[0]['id'].'">'.$this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' </a></th>';
//echo 'Imprimer';echo '&nbsp;'; 
// echo"<tr>";
// echo"<th style=\"width:700px;\"    id=\"tiba\" >Libellé</th>";
// echo"<th>Dose</th>";
// echo"<th>Nbr/jours</th>";
// echo"<th>jours</th>";
// echo"<th>Quantite </th>";
// echo"<th>Prix</th>";
// echo"<th>Action</th>";
// echo"</tr>";
// echo"</tr>";
	
	// if ( rds::creationPanier()  )
	// {
	   // $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   // if ($nbArticles <= 0)
	   // {
	   //echo '<tr bgcolor="#F0FFF0" ><td align="center" colspan="7" >Votre Ordonnance est vide </ td></tr>';
	   // }
	   // else
	   // {
	      // for ($i=0 ;$i < $nbArticles ; $i++)
	      // {
	         // echo '<tr  bgcolor="#F0FFF0" >';
	         // echo "<td>".View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'dci').'  '.View::nbrtostring('pharmacie','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 // echo "<td align=\"center\" >".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 // echo "<td align=\"center\" ><div id=\"smenux\"><a href=\"".URL."rds/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\">X</a></div></td>";  
			 // echo "</tr>";
	      // }
	     
		// echo '<tr bgcolor="#98F5FF" ><td colspan="7">'; 
		// echo "Nombre total de medicament : ".rds::compterArticles();
		// echo "</td>";	     
		// echo "</tr>";
		// echo '<tr bgcolor="#98F5FF"     ><td colspan="3">Montant total'; 
		// $ttc=rds::MontantGlobal()*1;
		// echo "</td>";
	    // echo "<td colspan=\"4\">";
	    // echo "Total TTC: ".$ttc." DA ";
	    // echo "</td>";
		// echo "</tr>";
		
		
		
		// echo '<tr  bgcolor="#F0F8FF" >';//
		     
			  // echo "<td align=\"center\"   colspan=\"3\">";
			  // echo '<div id="smenux">';
			  // echo '&nbsp;'; echo '<a href="'.URL.'rds/supprimePanier/'.$this->user[0]['id'].'">Annuler</a>';echo '&nbsp;'; 
			  // echo "</div>";
			  // echo "</td>";
			  // echo "<td  align=\"center\" colspan=\"4\">";
			  // echo '<div id="smenux">';
			  // echo '<a href="'.URL.'tcpdf/rds/ord.php?uc='.$this->user[0]['id'].'">Imprimer</a>';echo '&nbsp;'; 
			  // echo "</div>";
			  // echo "</td>";
			  
		// echo "</tr>";	  
	   // }
	   //echo"<tr><th colspan=\"7\">Votre Ordonnance (max 07 medicaments) </th></th>";
	// }
echo"</table>"	;
echo "</div>";


echo "</div>";
?>


<div class="scontentl2"><?php echo "Femme gestante  ";?> </div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		