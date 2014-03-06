<?php
$modsDoc = new Mapping_ModsDomDocument('collection');

foreach ($items as $item) {
  $modsDoc->appendModsElement($item, new Mapping_CulModsToModsMapping());
}

echo $modsDoc->getDoc()->saveXML();
?>