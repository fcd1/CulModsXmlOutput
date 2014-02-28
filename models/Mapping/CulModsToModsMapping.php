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

    // Check to see if we already have a physical description
    if ( ($culModsDigitalOrigin) && (!$this->_physicalDescription) ) {
      $this->_physicalDescription = $this->_node->appendChild(new Mods_PhysicalDescription());
    }

    // fcd1, 02/27/14:
    // Probably should be only one of these, but keep the foreach for now
    foreach ($culModsDigitalOrigin as $digitalOrigin) {
      $modsDigitalOrigin = $this->_physicalDescription->addDigitalOrigin($digitalOrigin);
    }
  
  }

  // fcd1, 02/27/14: still fuzzy if we can or cannot have multiple location elements
  // Gotta look into it. For now, code as if we can only have one.
  protected function _mapCulModsShelfLocation(Item $item)
  {

    $culModsShelfLocation = metadata($item, array('MODS', 'Shelf Location'), array('all' => true));

    // Check to see if we already have an location
    if ( ($culModsShelfLocation) && (!$this->_location) ) {
      $this->_location = $this->_node->appendChild(new Mods_Location());
    }

    foreach ($culModsShelfLocation as $shelfLocation) {
            $modsShelfLocator = $this->_location->addShelfLocator($shelfLocation);
    }
  
  }

  protected function _mapCulModsNotes(Item $item)
  {

    $culModsNotes = metadata($item, array('MODS', 'Notes'), array('all' => true));

    foreach ($culModsNotes as $notes) {
      $modsNote = $this->_node->appendChild(new Mods_Note($notes));
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
    $this->_mapCulModsShelfLocation($item);
    $this->_mapCulModsNotes($item);

  }

}
