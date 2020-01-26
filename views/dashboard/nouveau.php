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
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr  1fr 1fr 1fr 1fr 1fr 1fr 1fr ;
  grid-template-rows: 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px;
  grid-gap: 5px;
}
.hsl{background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%; }

#DATEV,#DATEP {background: yellow; text-align: center ; border-radius: 5px;width: 100%;height: 100%;}

#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}


#a {background: salmon;text-align: left  ;border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 1 / 2;color:white;}
#b {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 2 / 3;color:white;}
#c {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 3 / 4;color:white;}
#d {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 4 / 5;color:white;}
#e {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 5 / 6;color:white;}
#f {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 6 / 7;color:white;}
#g {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 7 / 8;color:white;}
#h {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 8 / 9;color:white;}
#i {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 1  / 3;  grid-row: 9 / 10;color:white;}


#a1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 1 / 2;}
#b1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 2 / 3;}
#c1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 3 / 4;}
#d1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 4 / 5;}
#e1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 5 / 6;}
#f1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 6 / 7;}
#g1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 7 / 8;}
#h1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 8 / 9;}
#i1 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 3  / 5;  grid-row: 9 / 10;}


#a2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 1 / 2;color:white;}
#b2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 2 / 3;color:white;}
#c2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 3 / 4;color:white;}
#d2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 4 / 5;color:white;}
#e2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 5 / 6;color:white;}
#f2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 6 / 7;color:white;}
#g2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 7 / 8;color:white;}
#h2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 8 / 9;color:white;}
#i2 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 5  / 7;  grid-row: 9 / 10;color:white;}


#a3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 1 / 2;}
#b3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 2 / 3;}
#c3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 3 / 4;}
#d3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 4 / 5;}
#e3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 5 / 6;}
#f3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 6 / 7;}
#g3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 7 / 8;}
#h3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 8 / 9;}
#i3 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 7  / 9;  grid-row: 9 / 10;}


#a4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 1 / 2;color:white;}
#b4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 2 / 3;color:white;}
#c4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 3 / 4;color:white;}
#d4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 4 / 5;color:white;}
#e4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 5 / 6;color:white;}
#f4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 6 / 7;color:white;}
#g4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 7 / 8;color:white;}
#h4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 8 / 9;color:white;}
#i4 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 9  / 11;  grid-row: 9 / 10;color:white;}


#a5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 1 / 2;}
#b5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 2 / 3;}
#c5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 3 / 4;}
#d5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 4 / 5;}
#e5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 5 / 6;}
#f5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 6 / 7;}
#g5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 7 / 8;}
#h5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 8 / 9;}
#i5 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 11  / 13;  grid-row: 9 / 10;}

#a6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 1 / 2;}
#b6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 2 / 3;}
#c6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 3 / 4;}
#d6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 4 / 5;}
#e6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 5 / 6;}
#f6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 6 / 7;}
#g6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 7 / 8;}
#h6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 8 / 9;}
#i6 {background: salmon;text-align: left;  border-radius:5px;padding: 0px;grid-column: 13  / 15;  grid-row: 9 / 10;}

#a7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 1 / 2;color:white;}
#b7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 2 / 3;color:white;}
#c7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 3 / 4;color:white;}
#d7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 4 / 5;color:white;}
#e7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 5 / 6;color:white;}
#f7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 6 / 7;color:white;}
#g7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 7 / 8;color:white;}
#h7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 8 / 9;color:white;}
#i7 {background: salmon;text-align: right;  border-radius:5px;padding: 0px;grid-column: 15  / 17;  grid-row: 9 / 10;color:white;}





</style>

<div class="sheader1l"><p id="lnouveau"><?php echo "Gérer les élèves scolarisés";?></p></div><div class="sheader1r"><p id="lnouveau"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer un nouveau élève scolarisé </div>
<div class="sheader2r">ID élève : </div>
<div class="listl">
	<form  action="<?php echo URL."dashboard/create/";?>"  method="POST"> 
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>    	 
			<!--
			<div id="content_1" class="contenttabs1"><div id="inner-grid">
			<div id="a">N°Etat civile </div><div id="a1"></div><div id="a2">ABORH</div>      <div id="a3"></div><div id="a4">Inscription</div><div id="a5"></div><div id="a6"></div><div id="a7">اللقب</div>
			<div id="b">Nom</div>           <div id="b1"></div><div id="b2">Prénom</div>     <div id="b3"></div><div id="b4">Père</div><div id="b5"></div><div id="b6"></div><div id="b7">لإسم</div>
			<div id="c">Sexe </div>         <div id="c1"></div><div id="c2">Wilaya Nais</div><div id="c3"></div><div id="c4">Commune Nais</div><div id="c5"></div><div id="c6"></div><div id="c7">إسم الأب</div>
			<div id="d">Wilaya Res</div>    <div id="d1"></div><div id="d2">Commune Res </div><div id="d3"></div><div id="d4">Adresse Res </div><div id="d5"></div><div id="d6"></div><div id="d7">إسم و لقب الأم</div>
			<div id="e">Établissement </div><div id="e1"></div><div id="e2">Palier</div>      <div id="e3"></div><div id="e4">Code_élève</div><div id="e5"></div><div id="e6"></div><div id="e7">عنوان الإقامة</div>
			<div id="f"></div><div id="f1"></div><div id="f2"></div><div id="f3"></div><div id="f4"></div><div id="f5"></div><div id="f6"></div><div id="f7"></div>
			<div id="g"></div><div id="g1"></div><div id="g2"></div><div id="g3"></div><div id="g4"></div><div id="g5"></div><div id="g6"></div><div id="g7"></div>
			<div id="h"></div><div id="h1"></div><div id="h2"></div><div id="h3"></div><div id="h4"></div><div id="h5"></div><div id="h6"></div><div id="h7"></div>
			<div id="i"></div><div id="i1"></div><div id="i2"></div><div id="i3"></div><div id="i4"></div><div id="i5"></div><div id="i6"></div><div id="i7"></div>
			</div></div>
			<div id="content_2" class="contenttabs2"><div id="inner-grid">
			</div></div>
			<div id="content_3" class="contenttabs3"><div id="inner-grid">
			</div></div>
			<div id="content_4" class="contenttabs4"><div id="inner-grid">
			</div></div>
			
			-->
			<?php
			$commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
	        $commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
			$wilayad1=Session::get('wilaya');
			$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
			$data = array(
			"DINS"           => date('d-m-Y'), 
			"HINS"           => date('H:m'), 
			"NOM"            => '', 
			"PRENOM"         => '', 
			"FILSDE"         => '', 
			"ETDE"           => '',
			"SEXE"           => array("M"=>"M","F"=>"F"),
			"classep"        => array("A"=>"A","B"=>"B","C"=>"C","D"=>"D","E"=>"E","F"=>"F","G"=>"G","H"=>"H","I"=>"I","J"=>"J","K"=>"K","L"=>"L","M"=>"M","N"=>"N","O"=>"O","P"=>"P","Q"=>"Q","R"=>"R","S"=>"S","T"=>"T","U"=>"U","V"=>"V","W"=>"W","X"=>"X","Y"=>"Y","Z"=>"Z"),
			"DATENS"         => date('d-m-Y'),
			"WILAYAN1"       => $wilayad1, 
			"WILAYAN2"       => $wilayad2, 
			"COMMUNEN1"      => $commune1,
			"COMMUNEN2"      => $commune2, 
			"WILAYAR1"       => $wilayad1, 
			"WILAYAR2"       => $wilayad2, 
			"COMMUNER1"      => $commune1,
			"COMMUNER2"      => $commune2,
			"ADRESSE"        => '', 
			"GABO"           => array("A+"=>"AP","A-"=>"AN","B+"=>"BP","B-"=>"BN","AB+"=>"ABP","AB-"=>"ABN","O+"=>"OP","O-"=>"ON"),
			"ECOLE1"         => '1', 
			"ECOLE2"         => 'Ecole', 
			"PALIER1"        => '1', 
			"PALIER2"        => 'Palier', 
			"NEC"            => '', 
			"code_patient"   => '',
			"PROFESSION1"    => '1',
			"PROFESSION2"    => 'Sans Profession',
			"TELPERE"        => '(00) 00-00-00-00',
			"EMAILPERE"      => 'x@yahoo.com',
			"NOMAR"          => '',
			"PRENOMAR"       => '',
			"FILSDEAR"       => '',
			"ETDEAR"         => '',
			"ADRESSEAR"      => ''
			);
			HTML::tabs($data);
			?>
			
		</div> 
	</form> 
</div>	
<div class="scontentl2">Créer un nouveau élève scolarisé</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp;?></div>
<script src="<?php echo URL;?>public/js/arabinput.js?t=<?php echo time();?>"></script>	