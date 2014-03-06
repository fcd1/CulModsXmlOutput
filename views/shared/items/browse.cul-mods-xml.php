<?php

$modsMap = new Mapping_CulModsToModsMapping('collection', false);

foreach ($items as $item) {
  $modsMap->map($item);
}

echo $modsMap->getDoc()->saveXML();
?>