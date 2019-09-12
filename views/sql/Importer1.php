<div class="sheader1l"><p id="evaluation"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="evaluation"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php  echo " Mortalité Hospitalière ";echo $this->msg;?></div><div class="sheader2r">***</div>
<div class="contentl">
<?php 
function txts($x,$y,$name,$size,$value,$param)
{
echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  id=\"".$param."\"   required />";
}
            echo "<hr>";
	echo '<form ALIGN="center" action="'.URL.'dspd/nouveau1/" method="POST">';
			echo "<p>";txts(100,240,'Datedebut',0,$this->Datedebut,'dateus');txts(100,240,'Datefin',0,$this->Datefin,'dateus1');echo "</p>";
			echo "<p>";
			$this->clgdatabse->merge($this->tbl_name,html::dateFR2US($this->Datedebut),html::dateFR2US($this->Datefin)); 
			echo "</p>";
		    echo "<hr>";
			echo "<p>Table name : ".$this->tbl_name."</p> ";
			echo "<hr>";
	 echo "</form>";
?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eva.png"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>

	
<div class="scontentl2"><?php echo "***";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "***";//echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "***";//echo dsp; echo "";?></div>		
