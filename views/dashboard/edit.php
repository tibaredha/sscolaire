<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les élèves scolarisés";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">
<P><?php echo "Modifier un élève scolarisé : ".$this->user[0]['NOM'];?> <?php echo $this->user[0]['PRENOM'];?><?php //echo $this->user[0]['id'];?></P>
</div>
<div class="sheader2r">
<?php
$ctrl='dashboard';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'Créer un nouveau élève scolarisé',    "vb1" => '',  "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Evaluation la santé scolaire',        "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => '',               "tb3" => 'graphe',                              "vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',                              "vb4" => '',  "icon4" => 'search.PNG');

echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>


</div>
<div class="listl">
	<form  action="<?php echo URL."dashboard/editSave/".$this->user[0]['id'];?>"  method="POST"> 
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>
			<?php
			$data = array(
			"DINS"           => HTML::dateUS2FR($this->user[0]['DINS']),                                           //ok 
			"HINS"           => $this->user[0]['HINS'],                                                            //ok 
			"NOM"            => $this->user[0]['NOM'],                                                             //ok 
			"PRENOM"         => $this->user[0]['PRENOM'],                                                          //ok 
			"FILSDE"         => $this->user[0]['FILSDE'],                                                          //ok 
			"ETDE"           => $this->user[0]['ETDE'],                                                            //ok
			"SEXE"           => array($this->user[0]['SEX']=>$this->user[0]['SEX'],"Masculin"=>"M","Feminin"=>"F"),//ok
			"classep"        => array($this->user[0]['classep']=>$this->user[0]['classep'],"A"=>"A","B"=>"B","C"=>"C","D"=>"D","E"=>"E","F"=>"F","G"=>"G","H"=>"H","I"=>"I","J"=>"J","K"=>"K","L"=>"L","M"=>"M","N"=>"N","O"=>"O","P"=>"P","Q"=>"Q","R"=>"R","S"=>"S","T"=>"T","U"=>"U","V"=>"V","W"=>"W","X"=>"X","Y"=>"Y","Z"=>"Z"),
			"DATENS"         => HTML::dateUS2FR($this->user[0]['DATENS']),                                         //ok 
			"WILAYAN1"       => $this->user[0]['WILAYAN'],                                                         //ok  
			"WILAYAN2"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAN'],'WILAYAS'),              //ok  
			"COMMUNEN1"      => $this->user[0]['COMMUNEN'],                                                        //ok 
			"COMMUNEN2"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNEN'],'COMMUNE'),             //ok  
			"WILAYAR1"       => $this->user[0]['WILAYAR'],                                                         //ok  
			"WILAYAR2"       => HTML::nbrtostring('wil','IDWIL',$this->user[0]['WILAYAR'],'WILAYAS'),              //ok  
			"COMMUNER1"      => $this->user[0]['COMMUNER'],                                                        //ok 
			"COMMUNER2"      => HTML::nbrtostring('com','IDCOM',$this->user[0]['COMMUNER'],'COMMUNE'),             //ok 
			"ADRESSE"        => $this->user[0]['ADRESSE'],                                                         //ok  
			"GABO"           => array($this->user[0]['GABO']=>$this->user[0]['GABO'],"AP"=>"AP","AN"=>"AN","BP"=>"BP","BN"=>"BN","ABP"=>"ABP","ABN"=>"ABN","OP"=>"OP","ON"=>"ON"),
			"ECOLE1"         => $this->user[0]['ECOLE'], 
			"ECOLE2"         => HTML::nbrtostring('ecole','id',$this->user[0]['ECOLE'],'ecole'), 
			"PALIER1"        => $this->user[0]['PALIER'], 
			"PALIER2"        => HTML::nbrtostring('palier','id',$this->user[0]['PALIER'],'nompalier'), 
			"NEC"            => $this->user[0]['NEC'],
			"code_patient"   => $this->user[0]['code_patient'],
			"PROFESSION1"    => $this->user[0]['PROFESSION'],
			"PROFESSION2"    => HTML::nbrtostring('profession','id',$this->user[0]['PROFESSION'],'Profession'),
			"TELPERE"        => $this->user[0]['TELPERE'],
			"EMAILPERE"      => $this->user[0]['EMAILPERE'],
			"NOMAR"          => $this->user[0]['NOMAR'],                                                           //ok
			"PRENOMAR"       => $this->user[0]['PRENOMAR'],                                                        //ok
			"FILSDEAR"       => $this->user[0]['FILSDEAR'],                                                        //ok
			"ETDEAR"         => $this->user[0]['ETDEAR'],                                                          //ok
			"ADRESSEAR"      => $this->user[0]['ADRESSEAR']                                                        //ok
			);
			HTML::tabs($data);
			?> 
		</div> 
	</form> 
</div>	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>
<script src="<?php echo URL;?>public/js/arabinput.js?t=<?php echo time();?>"></script>	


	