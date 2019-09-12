<div class="sheader1l"><p id="evaluation"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="evaluation"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo $this->msg; echo " Mortalité Hospitalière ";?></div><div class="sheader2r">***</div>
<div class="contentl">
<?php 
function txts($x,$y,$name,$size,$value,$param)
{
echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  id=\"".$param."\"   required />";
}
            echo "<hr>";
	
	echo '<form ALIGN="center" action="'.URL.'sql/Importer1/" method="POST">';
			echo "<p>";txts(100,240,'Datedebut',0,date('d-m-Y'),'dateus');txts(100,240,'Datefin',0,date('d-m-Y'),'dateus1');echo "</p>";
			echo "<p>";echo "</p>";
				echo "<hr>";
			echo '<input type="txt" name="tbl_name" value="deceshosp"/>'; 
			
			   echo "<hr>";
			echo '<input type="hidden" name="login" value="'.Session::get('login').'"/>';   
			echo ' <input type="hidden" name="structure" value="'.Session::get('structure').'"/> ';     
			echo "<p><input  id=\"submitr\" type=\"submit\" value=\"Ajouter\" /></p>";
	echo "</form>";
	          echo "<hr>";

?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eva.png"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>

	
<div class="scontentl2"><?php echo "***";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "***";//echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "***";//echo dsp; echo "";?></div>		
