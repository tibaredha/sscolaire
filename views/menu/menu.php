<?php
echo '<ul id="menu">';
	
	if (Session::get('loggedIn') == false)
	{
		include('menu_std.php');
	}
	else
	{
		if (Session::get('demgraphie') == 1){include('menu_ss.php');}	
			
		echo '<li class="parent"><a href="'.URL.'aide">'.TXT_HELP.' <img src="'.URL.'public/images/help.jpg" width="16" height="16" border="0" alt=""/></li>';	
		echo '<li class="parent">';
		echo '<a onclick="playSound()"  href="'.URL.'Login/logout/'.Session::get('id').'"  >'.TXT_LOGOUT.' <img src="'.URL.'public/images/s_loggoff.png" width="16" height="16" border="0" alt=""/></a></li>';
		// echo '<p  >';
	    echo '<a id="wdj1" href="'.URL.'hsl/search/0/10?o=id&q='.Session::get('uds').'"  >';
		if (Session::get('lang')=='ar') {echo HTML::nbrtostring('uds','id',Session::get('uds'),'udsar');}
		if (Session::get('lang')=='fr') {echo HTML::nbrtostring('uds','id',Session::get('uds'),'uds');}
		if (Session::get('lang')=='en') {echo HTML::nbrtostring('uds','id',Session::get('uds'),'uds');}
		echo '</a>';
		// echo '</p>';
	}
echo '</ul>';
?>	
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			