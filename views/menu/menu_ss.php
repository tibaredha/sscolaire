<?php 
if (Session::get('role') == '1'){ //admin
echo '<li class="parent">';echo '<a href="'.URL.'administrateur">'.TXT_ACCUEIL.' <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent">';echo '<a href="'.URL.'users/searchusers/0/10?o=id&q="> '.TXT_MEMBERS.' <img src="'.URL.'public/images/users.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent">';echo '<a href="'.URL.'Msgs">'.TXT_MESSAGES.' <img src="'.URL.'public/images/alerte.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent">';echo '<a href="'.URL.'administrateur/cfg/">'.TXT_CONFIGURATION.' <img src="'.URL.'public/images/cfg.jpg" width="16" height="16" border="0" alt=""/></a>';
// echo '<li class="parent">';echo '<a href="'.URL.'dspd/">DSP <img src="'.URL.'public/images/eva.png" width="16" height="16" border="0" alt=""/></a>';
}

if (Session::get('role') == "2"){//
echo '<li class="parent">';echo '<a href="'.URL.'dashboard">'.TXT_ACCUEIL.' <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent"><a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">'.TXT_AGENDA.' <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></li>';	
echo '<li class="parent">';echo '<a href="'.URL.'Msgs">'.TXT_MESSAGES.' <img src="'.URL.'public/images/alerte.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
}

if (Session::get('role') == "3"){//
echo '<li class="parent">';echo '<a href="'.URL.'dashboard">'.TXT_ACCUEIL.' <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a></li>'; 
echo '<li class="parent"><a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">'.TXT_AGENDA.' <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></li>';	
echo '<li class="parent">';echo '<a href="'.URL.'Msgs">'.TXT_MESSAGES.' <img src="'.URL.'public/images/alerte.jpg" width="16" height="16" border="0" alt=""/></a></li>'; 
}






