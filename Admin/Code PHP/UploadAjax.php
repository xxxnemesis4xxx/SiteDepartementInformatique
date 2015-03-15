<?php

function miniature( $imgSrc, $nomImage, $dir){
   // Largeur et hauteur des images miniatures
   $largeur = 50; $hauteur=50;


   // quelle taille fait notre image ?
   $largeurSrc = imagesx($imgSrc);
   $hauteurSrc = imagesy($imgSrc);
   
   // Création de l'image miniature en essayant de respecter le format portrait ou paysage
   if($hauteurSrc > $largeurSrc){
      $l = $hauteur; $h = $largeur;
      $lSrc = $hauteurSrc; $hSrc = $largeurSrc;
   } else{
      $l = $largeur; $h = $hauteur;
      $lSrc = $largeurSrc; $hSrc = $hauteurSrc;
   }
   $mini = @ImageCreateTrueColor ($l, $h);

   // On ressample l'image initiale pour en créer une copie en miniature
   ImageCopyResampled($mini, $imgSrc, 8, 8, 0, 0, $l-(2*8), $h-(2*8), $lSrc, $hSrc);

   // On enregistre l'image dans le répertoire des miniatures
   imageJpeg ( $mini,"$dir/mini/$nomImage");
   
   return $nomImage;
}
?>
<?php
	//chemin pour l'enregistrement du fichier
	$dir = $_SERVER['DOCUMENT_ROOT'] . "/" . $_POST["UploadPath"];
	$FileTagName = "SelectedFile";
	//copie du fichier du dossier temporaire au bon endroit
	move_uploaded_file($_FILES[$FileTagName]["tmp_name"], $dir.$_FILES[$FileTagName]["name"]);

    switch($_FILES[$FileTagName]["type"]){
       case "image/jpeg":
          $imgSrc = imagecreatefromjpeg($dir.$_FILES[$FileTagName]["name"]);
          break;
       case "image/png":
          $imgSrc = imagecreatefrompng($dir.$_FILES[$FileTagName]["name"]);
          break;
       case "image/gif":
          $imgSrc = imagecreatefromgif($dir.$_FILES[$FileTagName]["name"]);
          break;
       default:
          unset($imgSrc);
          break;
    }
	miniature($imgSrc, $_FILES[$FileTagName]["name"], $dir);
?>
