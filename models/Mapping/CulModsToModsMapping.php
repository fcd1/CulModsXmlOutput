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

  protected function _mapCulModsPlaceOfOrigin(Item $item)
  {

    $culModsPlaceOfOrigin = metadata($item, array('MODS', 'Place of Origin'), array('all' => true));

    // Check to see if we already have an location
    if ( ($culModsPlaceOfOrigin) && (!$this->_originInfo) ) {
      $this->_originInfo = $this->_node->appendChild(new Mods_OriginInfo());
    }

    foreach ($culModsPlaceOfOrigin as $placeOfOrigin) {
      $modsPlace = $this->_originInfo->appendChild(new Mods_Place());
      $modsPlace->addPlaceTerm($placeOfOrigin,'text');
    }

  }

  protected function _mapCulModsKeyDate(Item $item)
  {
    $culModsKeyDate = metadata($item, array('MODS', 'Key Date'), array('all' => true));

    // Check to see if we alread have an originInfo
    // fcd1, 02/28/14:
    // Check wiht Melanie and Robbie to make sure we don't want this in a 
    // new originInfo
    if ( ($culModsKeyDate) && (!$this->_originInfo) ) {
      $this->_originInfo = $this->_node->appendChild(new Mods_OriginInfo());
    }

    foreach ($culModsKeyDate as $keyDate) {
      // Get start date and, if present, end date
      // Assumption is that each date will be in the format YYYY-MM-DD
      // and the dates will be separated by a space
      // fcd1, 02/28/14:
      // Probably want to add some checking on the date format before
      // setting the encoding attribute. Do this if I have time
      $keyDates = explode(" ", $keyDate);

      // $modsDateCreated = $this->_originInfo->addDateCreated($keyDate);

      if (isset($keyDates[0]) ) {


	$modsDateCreated = $this->_originInfo->addDateCreated($keyDates[0],
							      'w3cdtf',
							      'start');
      }

      if (isset($keyDates[1]) ) {
	$modsDateCreated = $this->_originInfo->addDateCreated($keyDates[1],
							      'w3cdtf',
							      'end');
      }

    }

  }

  protected function _mapOmekaItemId(Item $item)
  {

    $omekaId = metadata($item,'ID');
    $modsIdentifier = $this->_node->appendChild(new Mods_Identifier($omekaId));
    $modsIdentifier->setTypeAttribute('local');
    $modsIdentifier->setDisplayLabelAttribute('Omeka ID');
    
  }


  protected function _map(Item $item)
  {

    $this->_mapDCTitle($item);
    $this->_mapDCCreator($item);
    $this->_mapDCSubject($item);
    $this->_mapDCDescription($item);
    $this->_mapDCPublisher($item);
    $this->_mapDCContributor($item);
    $this->_mapDCDate($item);
    $this->_mapDCType($item);
    $this->_mapDCFormat($item);
    $this->_mapDCIdentifier($item);
    $this->_mapDCSource($item);
    $this->_mapDCLanguage($item);
    $this->_mapDCRelation($item);
    $this->_mapDCCoverage($item);
    $this->_mapDCRights($item);
    $this->_mapCulModsDigitalOrigin($item);
    $this->_mapCulModsShelfLocation($item);
    $this->_mapCulModsNotes($item);
    $this->_mapCulModsPlaceOfOrigin($item);
    $this->_mapCulModsKeyDate($item);
    $this->_mapOmekaItemId($item);

  }

}
