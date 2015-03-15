<?php
$dir = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $_POST["NomDossier"];
$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it,
RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
if ($file->isDir()){
rmdir($file->getRealPath());
} else {
unlink($file->getRealPath());
}
}
rmdir($dir);
?>
