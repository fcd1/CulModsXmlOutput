<?php
  //$modsMap = new Mapping_LocDCToModsMapping($item, 'item',true);
  //$modsMap = new Mapping_TestCulModsToModsMapping($item, 'item',true);
  $modsMap = new Mapping_CulModsToModsMapping('item',true);
$modsMap->map($item);


echo $modsMap->getDoc()->saveXML();
?>