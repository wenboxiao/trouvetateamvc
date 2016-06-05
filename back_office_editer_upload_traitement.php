<?php

if(isset($_FILES['logo_site']) AND $_FILES['logo_site']['error']==0) {

	if($_FILES['logo_site']['size']<= 1000000) {

		$infosfichier = pathinfo($_FILES['logo_site']['name']);
		$extension_upload = $infosfichier['extension'];
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

		if(in_array($extension_upload, $extensions_autorisees)) {

			move_uploaded_file($_FILES['logo_site']['tmp_name'], 'logos/' . basename($_FILES['logo_site']['name']));
			$newlogo="logos/".basename($_FILES['logo_site']['name']);
			include('back_office_editer_site.php');
		}
	}
}

?>