<?php

        $id = isset($_GET['id'])?intval($_GET['id']):NULL;
        $N = isset($_GET['n'])?intval($_GET['n']):1;
	session_start();
	ini_set("display_errors",true);
	include("sampleImages.php");  
	$origen = $_FILES['file_upload'.$N]['tmp_name'];
	@getimagesize($origen) or die('<span style="font-size:10px;">Error</span>');
	$image = new SimpleImage();
  	$image->load($origen);
        if ($id){
            $image->save("../images/inmuebles/inm_".$id."_".$N.".jpg");
            $image->resizeToWidth(180);
            $image->save("../images/inmuebles/inm_".$id."_".$N."_min.jpg");
        }else {
            $image->save("../images/inmuebles/".$N."__".session_id().".jpg");
            $image->resizeToWidth(180);
            $image->save("../images/inmuebles/".$N."__".session_id()."_min.jpg");
        }
 	 
?>
