<?php
  /**
   * Following use the CUL mapping to map DC and MODS and other 
   * metadata stored in Omeka
   * 
   * 
   */
class Mapping_CulModsToModsMapping extends Mapping_LocDCToModsMapping
{

  protected function _mapCulModsDigitalOrigin(Item $item)
  {
    $culModsDigitalOrigin = metadata($item, array('MODS', 'Digital Origin'), array('all' => true));

    // fcd1, 02/27/14:
    // Probably should be only one of these, but keep the foreach for now
    // Check to see if we alread have an originInfo
    if ( ($culModsDigitalOrigin) && (!$this->_physicalDescription) ) {
      $this->_physicalDescription = $this->_node->appendChild(new Mods_PhysicalDescription());
    }

    foreach ($culModsDigitalOrigin as $digitalOrigin) {
      $modsDigitalOrigin = $this->_physicalDescription->addDigitalOrigin($digitalOrigin);
    }
  
  }

  protected function _map(Item $item)
  {

    $this->_mapTitle($item);
    $this->_mapCreator($item);
    $this->_mapSubject($item);
    $this->_mapDescription($item);
    $this->_mapPublisher($item);
    $this->_mapContributor($item);
    $this->_mapDate($item);
    $this->_mapType($item);
    $this->_mapFormat($item);
    $this->_mapIdentifier($item);
    $this->_mapSource($item);
    $this->_mapLanguage($item);
    $this->_mapRelation($item);
    $this->_mapCoverage($item);
    $this->_mapRights($item);
    $this->_mapCulModsDigitalOrigin($item);

  }

}
