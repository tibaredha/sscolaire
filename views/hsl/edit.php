<style>
#tabbed_box{margin: 0px auto 0px 220px;width: 640px;}
.tabbed_box h4 {font-size: 18px;color:#2F4F6F; letter-spacing:-1px;margin-bottom:10px;}  
.tabbed_area {border: 1px solid #494e52;background-color: green;padding: 8px;}  
ul.tabs {margin: 0px; padding: 0px;margin-top: 5px;margin-bottom: 6px;}  
ul.tabs li {list-style: none;display: inline;}  
ul.tabs li a {background-color: #464c54;color: #ffebb5;padding: 8px 14px 8px 14px;text-decoration: none;font-size: 9px;font-family: Verdana, Arial, Helvetica, sans-serif;font-weight: bold;text-transform: uppercase;border: 1px solid #464c54;            }  
ul.tabs li a:hover {background-color: #2f343a;border-color: #2f343a;}  
ul.tabs li a.active {background-color: #ffffff;color: #282e32;border: 1px solid #464c54;border-bottom: 1px solid #ffffff;  }
.contenttabsh1,.contenttabsh2,.contenttabsh3,.contenttabsh4,.contenttabsh5,.contenttabsh6,.contenttabsh7,.contenttabsh8,.contenttabsh9,.contenttabsh10 {background-color: white; padding: 10px;  border: 1px solid #464c54;height: 340px;}  
#contenth_2, #contenth_3 , #contenth_4 , #contenth_5, #contenth_6, #contenth_7, #contenth_8, #contenth_9, #contenth_10{ display: none; height: 340px; clear: all;} 

#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr  1fr 1fr 1fr ;
  grid-template-rows: 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px;
  grid-gap: 5px;
}
.hsl{background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%; }

#DATEV,#DATEP {background: yellow; text-align: center ; border-radius: 5px;width: 100%;height: 100%;}

#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}


#a {background: salmon;text-align: center;border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 1 / 2;}
#b {background: salmon;text-align: center;border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 2 / 3;}

#c {background: salmon;text-align: center;border-radius:5px;padding: 0px;grid-column: 3  / 8;  grid-row: 1 / 2;color:white;}
#d {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 2 / 3;}
#e {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 3 / 4;}
#f {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 4 / 5;}
#g {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 5 / 6;}
#h {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 6 / 7;}
#i {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 7 / 8;}
#j {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 8 / 9;}
#k {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 6;  grid-row: 9 / 10;}



#d1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 2 / 3;}
#e1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 3 / 4;}
#f1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 4 / 5;}
#g1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 5 / 6;}
#h1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 6 / 7;}
#i1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 7 / 8;}
#j1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 8 / 9;}
#k1 {background: salmon;text-align: center;  border-radius:5px;padding: 0px;grid-column: 6  / 8;  grid-row: 9 / 10;}


</style>
<script>
        /*Activates the Tabs*/
function tabSwitch(new_tab, new_content) {    
    document.getElementById('contenth_1').style.display = 'none';  
    document.getElementById('contenth_2').style.display = 'none';  
    document.getElementById('contenth_3').style.display = 'none';  
	document.getElementById('contenth_4').style.display = 'none';  
	document.getElementById('contenth_5').style.display = 'none';  
	document.getElementById('contenth_6').style.display = 'none';  
	document.getElementById('contenth_7').style.display = 'none';  
	document.getElementById('contenth_8').style.display = 'none';  
	document.getElementById('contenth_9').style.display = 'none';  
	document.getElementById('contenth_10').style.display = 'none';  
	
	/*document.getElementById('content_3').style.display = 'none';*/ 
	document.getElementById(new_content).style.display = 'block';     
    document.getElementById('tabh_1').className = '';  
    document.getElementById('tabh_2').className = '';  
    document.getElementById('tabh_3').className = '';  
	document.getElementById('tabh_4').className = '';  
	document.getElementById('tabh_5').className = '';  
	document.getElementById('tabh_6').className = '';  
	document.getElementById('tabh_7').className = '';  
	document.getElementById('tabh_8').className = '';  
	document.getElementById('tabh_9').className = '';  
	document.getElementById('tabh_10').className = '';  
	
	/*document.getElementById('tab_3').className = ''; */        
    document.getElementById(new_tab).className = 'active';        
}




</script>

<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Hygiene et salubrité des locaux UDS  : <?php echo HTML::nbrtostring('uds','id',Session::get('uds'),'uds') ;?> </div>
<div class="sheader2r">
<?php
$ctrl='hsl';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => '***',         "tb1" => 'Créer un nouveau élève scolarisé',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation la santé scolaire',          "vb2" => '',  "icon2" => 'eva.png',
"cb3"         => $ctrl,    "mb3" => '',            "tb3" => '',                                      "vb3" => '',  "icon3" => 'graph.PNG',
"cb4"         => $ctrl,    "mb4" => '',            "tb4" => '',                                      "vb4" => '',  "icon4" => 'search.PNG');
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div>

<div class="contentl formaut">
	<form class="tabaut"action="<?php echo URL."hsl/editehsl/".$this->user[0]['id'];?>" method="post">	
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tabh_1', 'contenth_1');" id="tabh_1" class="active">classe</a></li>  
				<li><a href="javascript:tabSwitch('tabh_2', 'contenth_2');" id="tabh_2">eau</a></li> 
				<li><a href="javascript:tabSwitch('tabh_3', 'contenth_3');" id="tabh_3">lavabos</a></li> 	
				<li><a href="javascript:tabSwitch('tabh_4', 'contenth_4');" id="tabh_4">toilettes</a></li> 
				<li><a href="javascript:tabSwitch('tabh_5', 'contenth_5');" id="tabh_5">COUR</a></li> 	
				<li><a href="javascript:tabSwitch('tabh_6', 'contenth_6');" id="tabh_6">CUISINE</a></li> 	
			    <li><a href="javascript:tabSwitch('tabh_7', 'contenth_7');" id="tabh_7">STOCKAGE</a></li> 	
			    <li><a href="javascript:tabSwitch('tabh_8', 'contenth_8');" id="tabh_8">REFECTOIRE</a></li> 	
			    <li><a href="javascript:tabSwitch('tabh_9', 'contenth_9');" id="tabh_9">DORTOIRE</a></li> 	
			    <li><a href="javascript:tabSwitch('tabh_10', 'contenth_10');" id="tabh_10">DESIN,DERA</a></li> 	
			
			</ul>    	 
		 
		<div id="contenth_1" class="contenttabsh1"><div id="inner-grid">
		    <div id="a"><input id="DATEV" type="text"     name="DATEV"    value="<?php echo date ('d-m-Y')  ;?>" required=""/> </div>
			<div id="b"><?php HTML::ECOLE('ECOLE','IDECOLE','CLECOLE','ecole',"","",Session::get('uds'));?></div>
			<div id="c">CLASSE</div>
			
			<div id="d">Fréquence de néttoyage humide</div>                 <div id="d1"><select name="hsl1" id="" class="hsl" ><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>     
			<div id="e">Propreté noter de 01 a 10 </div>                    <div id="e1"><select name="hsl2" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div> 
			<div id="f">Chauffage (modalité) </div>                         <div id="f1"><select name="hsl3" id="" class="hsl"><option value="1">Electricite</option><option value="2">Gaz naturel</option><option value="3">Petrole</option><option value="4">Charbon</option><option value="5">Aucun</option></select></div> 
			<div id="g">Nombre d'appareils en bonne etat / Total </div>     <div id="g1"><input  name="hsl4" id="hsl4" class="hsl" type="text" value="<?php echo $this->user[0]['hsl4'] ;?>"  /></div> 	
			<div id="h">Nombre de porte mentaux par classe </div>           <div id="h1"><input  name="hsl5" id="hsl5" class="hsl" type="text" value="<?php echo $this->user[0]['hsl5'] ;?>"  /></div> 
			<div id="i">Nombre de carreaux cassées</div>                    <div id="i1"><input  name="hsl6" id="hsl6" class="hsl" type="text" value="<?php echo $this->user[0]['hsl6'] ;?>"  /></div> 
			<div id="j">Eclairage </div>                                    <div id="j1"><select name="hsl7" id="" class="hsl"><option value="1">Naturel</option><option value="2">Electricite</option><option value="3">Aucun</option></select></div> 
			<div id="k">Distance 1ère table tableau en cm </div>            <div id="k1"><input  name="hsl8" id="hsl8" class="hsl" type="text" value="<?php echo $this->user[0]['hsl8'] ;?>"  /></div> 
		</div></div>
		
		
		<div id="contenth_2" class="contenttabsh2"><div id="inner-grid">
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">EAU</div>
			
			<div id="d">Approvisionnement en eau potable</div>             <div id="d1"><input  name="hsl9"  id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl9'] ;?>"  /></div>   
			<div id="e">Traitement (chaux-javel) fréquence</div>           <div id="e1"><input  name="hsl10" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl10'] ;?>"  /></div> 
			<div id="f">Date de prélevemnt</div>                           <div id="f1"><input  name="DATEP" id="DATEP" type="text" value="<?php echo date ('d-m-Y')  ;?>"  required=""   /></div> 
			<div id="g">Résultat bacteriologique (colimetrie) </div>       <div id="g1"><input  name="hsl11" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl11'] ;?>"  /></div> 
			<div id="h">Controle de la cloration</div>                     <div id="h1"><input  name="hsl12" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl12'] ;?>"  /></div> 
			<div id="i">Evacuation des eaux usées </div>                   <div id="i1"><input  name="hsl13" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl13'] ;?>"  /></div> 
			<div id="j">***</div>                                          <div id="j1">***</div> 
			<div id="k">***</div>                                          <div id="k1">***</div> 
		</div></div>
		
		<div id="contenth_3" class="contenttabsh3"><div id="inner-grid"> 
		    <div id="a">***</div>
			<div id="b">***</div>
			
			<div id="c">LAVABOS</div>
			<div id="d">Nombre de robinet fonctionnels / Total</div> <div id="d1"><input  name="hsl14" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl14'] ;?>"  /></div>   
			<div id="e"></div>                                       <div id="e1"></div> 
			<div id="f"></div>                                       <div id="f1"></div> 
			<div id="g"></div>                                       <div id="g1"></div> 
			<div id="h"></div>                                       <div id="h1"></div> 
			<div id="i"></div>                                       <div id="i1"></div> 
			<div id="j"></div>                                       <div id="j1"></div> 
			<div id="k"></div>                                       <div id="k1"></div> 
		</div></div>
		
		<div id="contenth_4" class="contenttabsh4"><div id="inner-grid"> 
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">TOILETTE</div>
			<div id="d">Nombre de cabinets fonctionnels / Total </div><div id="d1"><input  name="hsl15" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl15'] ;?>"  /></div>   
			<div id="e">Nombre d'urinoirs</div>                       <div id="e1"><input  name="hsl16" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl16'] ;?>"  /></div> 
			<div id="f">Désinfection journalière </div>               <div id="f1"><input  name="hsl17" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl17'] ;?>"  /></div> 
			<div id="g">Propreté noter de 01 a 10 </div>              <div id="g1"><select name="hsl18" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div> 
			<div id="h"></div>                                        <div id="h1"></div> 
			<div id="i"></div>                                        <div id="i1"></div> 
			<div id="j"></div>                                        <div id="j1"></div> 
			<div id="k"></div>                                        <div id="k1"></div> 
		</div></div>
		
		<div id="contenth_5" class="contenttabsh5"><div id="inner-grid">
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">COUR</div>
			<div id="d">Sol </div>                                    <div id="d1"><input  name="hsl19" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl19'] ;?>"  /></div>   
			<div id="e">Cloture</div>                                 <div id="e1"><input  name="hsl20" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl20'] ;?>"  /></div>
			<div id="f">Signalisation routiere </div>                 <div id="f1"><input  name="hsl21" id="" class="hsl" type="text" value="<?php echo $this->user[0]['hsl21'] ;?>"  /></div>
			<div id="g"></div>                                        <div id="g1"></div>
			<div id="h"></div>                                        <div id="h1"></div>
			<div id="i"></div>                                        <div id="i1"></div>
			<div id="j"></div>                                        <div id="j1"></div>
			<div id="k"></div>                                        <div id="k1"></div>
		</div></div>
		
		<div id="contenth_6" class="contenttabsh6"><div id="inner-grid">
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">CUISINE</div>
			<div id="d">Etat du sol et des murs</div>                      <div id="d1"></div>   
			<div id="e">Lavage journalier noter de 01 a 10</div>           <div id="e1"><select name="hsl22" id="" class="hsl" ><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>
			<div id="f">Propreté ustensiles noter de 01 a 10 </div>        <div id="f1"><select name="hsl23" id="" class="hsl" ><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>
			<div id="g">Propreté du personnel noter de 01 a 10 </div>      <div id="g1"><select name="hsl24" id="" class="hsl" ><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>
			<div id="h"></div>                                             <div id="h1"></div>
			<div id="i"></div>                                             <div id="i1"></div>
			<div id="j"></div>                                             <div id="j1"></div>
			<div id="k"></div>                                             <div id="k1"></div>
		</div></div>
		
		<div id="contenth_7" class="contenttabsh7"><div id="inner-grid"> 
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">STOCKAGE DES ALIMENTS</div>
			<div id="d">Propreté du local noter de 01 a 10</div>      <div id="d1"><select name="hsl25" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>   
			<div id="e">Condition (réfrigérateur-garde manger)</div>  <div id="e1"></div>  
			<div id="f"></div>                                        <div id="f1"></div>  
			<div id="g"></div>                                        <div id="g1"></div>  
			<div id="h"></div>                                        <div id="h1"></div>  
			<div id="i"></div>                                        <div id="i1"></div>  
			<div id="j"></div>                                        <div id="j1"></div>  
			<div id="k"></div>                                        <div id="k1"></div>  
		</div></div>
		
		<div id="contenth_8" class="contenttabsh8"><div id="inner-grid"> 
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">REFECTOIRE</div>
			<div id="d">Etat du local</div>                          <div id="d1"></div>  
			<div id="e">Propreté du sol noter de 01 a 10</div>       <div id="e1"><select name="hsl26" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div> 
			<div id="f">Propreté des tables noter de 01 a 10</div>   <div id="f1"><select name="hsl27" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div> 
			<div id="g">Propreté des couverts  noter de 01 a 10</div><div id="g1"><select name="hsl28" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div> 
			<div id="h"></div>                                       <div id="h1"></div> 
			<div id="i"></div>                                       <div id="i1"></div> 
			<div id="j"></div>                                       <div id="j1"></div> 
			<div id="k"></div>                                       <div id="k1"></div> 
		</div></div>
		
		<div id="contenth_9" class="contenttabsh9"><div id="inner-grid"> 
		    <div id="a">***</div>
			<div id="b">***</div>
			<div id="c">DORTOIRE</div>
			<div id="d">Propreté des chambres noter de 01 a 10</div>  <div id="d1"><select name="hsl29" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>   
			<div id="e">Propreté des toilettes noter de 01 a 10</div> <div id="e1"><select name="hsl30" id="" class="hsl"><option value="1">1</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div>   
			<div id="f">Chauffage</div>                               <div id="f1"></div>   
			<div id="g">Espassement des lits</div>                    <div id="g1"></div>   
			<div id="h"></div>                                        <div id="h1"></div>   
			<div id="i"></div>                                        <div id="i1"></div>   
			<div id="j"></div>                                        <div id="j1"></div>   
			<div id="k"></div>                                        <div id="k1"></div>   
		</div></div>
		
		
		<div id="contenth_10" class="contenttabsh10"><div id="inner-grid"> 
		    <div id="a">***</div>
			<div id="b"><input id="hh" onclick="playSound()"  name="submit1"   type="submit" value="Envoyer"/> </div>
			<div id="c">DESINFECTION ET DERATISATION</div>
			<div id="d"> </div>                                      <div id="d1"></div>   
			<div id="e"></div>                                       <div id="e1"></div>   
			<div id="f"></div>                                       <div id="f1"></div>   
			<div id="g"></div>                                       <div id="g1"></div>   
			<div id="h"></div>                                       <div id="h1"></div>   
			<div id="i"></div>                                       <div id="i1"></div>   
			<div id="j"></div>                                       <div id="j1"></div>   
			<div id="k"></div>                                       <div id="k1"></div>   
		</div></div>
	
	
	
	
	
	<?php echo '</div>'; ?>
	
	
	        <?php 
			echo '<div ><input type="hidden" name="UDS"      value="'.Session::get('uds').'"/> </div>';
			echo '<div ><input type="hidden" name="STRUCTURE"value="'.Session::get('structure').'"/> </div>';
			?>
	</form>				
</div>	

<div class="content"><img id="image" src="<?php echo URL;?>public/images/hsl.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>
<div class="scontentl2"></div>		
<div class="scontentl3"></div>
<div class="scontentr1"></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			

<div class="scontentl2">c</div>		
<div class="scontentl3">d</div>
<div class="scontentr1">e</div>
<script>
var checkbox = document.querySelector("#YOURBOX");
var input = document.querySelector("#DATECSBD");
var toogleInput = function(e){input.disabled = !e.target.checked;};
toogleInput({target: checkbox});
checkbox.addEventListener("change", toogleInput);
</script>
	