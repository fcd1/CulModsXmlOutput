<?php
  //$modsMap = new Mapping_LocDCToModsMapping($item, 'item',true);
  $modsMap = new Mapping_CulModsToModsMapping($item, 'item',true);
echo $modsMap->getDoc()->saveXML();
?>