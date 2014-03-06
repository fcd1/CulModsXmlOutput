<?php
$modsDoc = new Mapping_ModsDomDocument('item');
$modsDoc->appendModsElement($item, new Mapping_CulModsToModsMapping());
echo $modsDoc->getDoc()->saveXML();
?>