<?php
$modsXml = new Mods_ModsCollection($items, 'itemContainer');
echo $modsXml->getDoc()->saveXML();
?>