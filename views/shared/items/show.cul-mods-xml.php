<?php
$modsMap = new Mapping_LocDCToModsMapping($item, 'item',true);
echo $modsMap->getDoc()->saveXML();
?>