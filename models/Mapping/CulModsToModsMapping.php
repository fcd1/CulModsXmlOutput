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

    // fcd1, 02/28/14:
    // There should be only one Cul Mods Key Date field
    // $culModsKeyDate = metadata($item, array('MODS', 'Key Date'), array('all' => true));
    $culModsKeyDate = metadata($item, array('MODS', 'Key Date'));

    // Check to see if we alread have an originInfo
    // fcd1, 02/28/14:
    // Check wiht Melanie and Robbie to make sure we don't want this in a 
    // new originInfo
    if ( ($culModsKeyDate) && (!$this->_originInfo) ) {
      $this->_originInfo = $this->_node->appendChild(new Mods_OriginInfo());
    }

    // Note: according to the MODS standard, there can only be one date
    // with the keyDate attribute set to yes - in our case, the start
    // date (which may be the only date anyway)
    $keyDates = explode(" ", $culModsKeyDate);

    if (isset($keyDates[0]) ) {

      $modsDateCreated = $this->_originInfo->addDateCreated($keyDates[0],
							    'w3cdtf',
							    'start',
							    'yes');
    }

    if (isset($keyDates[1]) ) {
      $modsDateCreated = $this->_originInfo->addDateCreated($keyDates[1],
							    'w3cdtf',
							    'end');
    }

  }

  protected function _mapOmekaItemId(Item $item)
  {

    $omekaId = metadata($item,'ID');
    $modsIdentifier = $this->_node->appendChild(new Mods_Identifier($omekaId));
    $modsIdentifier->setTypeAttribute('local');
    $modsIdentifier->setDisplayLabelAttribute('Omeka ID');
    
  }

  // The DLF/Aquifer Implementation Guidelines lists recordInfo as required and
  // non-repeatable.
  // Probably not going to populate it with info retrieved from the item,
  // but the item will be passed in as an argument just in case
  protected function _createRecordInfo(Item $item)
  {

    // Check to see if we alread have a location
    if (!$this->_recordInfo) {
      $this->_recordInfo = $this->_node->appendChild(new Mods_RecordInfo());
    }

    $this->_recordInfo->addLanguageOfCataloging('eng','code','iso639-2b');
  }

  // fcd1, 02/27/14: still fuzzy if we can or cannot have multiple location elements
  // Gotta look into it. For now, code as if we can only have one.
  protected function _mapCulModsRepositoryName(Item $item)
  {

    $culModsRepositoryName = metadata($item, array('MODS', 'Repository Name'), array('all' => true));

    // Check to see if we already have an location
    if ( ($culModsRepositoryName) && (!$this->_location) ) {
      $this->_location = $this->_node->appendChild(new Mods_Location());
    }

    foreach ($culModsRepositoryName as $repositoryName) {
      $modsPhysicalLocation = $this->_location->addPhysicalLocation($repositoryName);
    }
  
  }

  protected function _mapCulModsPhysicalDescription(Item $item)
  {
    $culModsPhysicalDescription = metadata($item, array('MODS', 'Physical Description'), array('all' => true));

    // Check to see if we already have a physical description
    if ( ($culModsPhysicalDescription) && (!$this->_physicalDescription) ) {
      $this->_physicalDescription = $this->_node->appendChild(new Mods_PhysicalDescription());
    }

    foreach ($culModsPhysicalDescription as $physicalDescription) {
      $modsExtent = $this->_physicalDescription->addExtent($physicalDescription);
    }
  
  }

  protected function _mapCulModsFormGenre(Item $item)
  {
    $culModsFormGenre = metadata($item, array('MODS', 'Form/Genre'), array('all' => true));

    // Check to see if we alread have an originInfo
    if ( ($culModsFormGenre) && (!$this->_physicalDescription) ) {
      $this->_physicalDescription = $this->_node->appendChild(new Mods_PhysicalDescription());
    }

    foreach ($culModsFormGenre as $formGenre) {
      $modsForm = $this->_physicalDescription->addForm($formGenre);
      }

  }

  protected function _mapItemTypeMetadataItemType(Item $item)
  {

    // $itemType = metadata($item, array('Item Type Metadata', 'Item Type'));
    // $itemType = $item->Type[0];
    // $itemType = 'foo';
    $resultsArray = array();

    // fcd1, 02/28/14 BEGIN =>
    // Got the following piece of code form the Modsoutput
    // plugin. Why it works I'm not sure, but it does, and I 
    // have not yet figured out a better way. If I can't, I
    // should move this to a helper method
    foreach($item->Type as $itemType)
      $resultsArray[] = $itemType;
    $itemType =  $resultsArray[0];
    // <= END 02/28/14, fcd1

    // fcd1, 02/28/14:
    // May want to give it a default allowed value. However, the
    // possible input values for $itemType are preset, so as long
    // as all preset values are covered, $typeOfResourceContent
    // will be set. If Item Type was never set in Omeka, we
    // won't include a MODS typeOfResource element.
    $typeOfResourceContent = null;

    // Map Item Type to allowed content for MODS typeOfResource
    switch ($itemType) {
    case "Document":
      $typeOfResourceContent = 'text';
      break;
    case "Moving Image":
      $typeOfResourceContent = 'moving image';
      break;
    case "Oral History":
      $typeOfResourceContent = 'mixed material';
      break;
    case "Sound":
      $typeOfResourceContent = 'sound recording';
      break;
    case "Still Image":
      $typeOfResourceContent = 'still image';
      break;
    case "website":
      $typeOfResourceContent = 'still image';
      break;
    case "Event":
      $typeOfResourceContent = 'mixed material';
      break;
    case "Email":
      $typeOfResourceContent = 'text';
      break;
    case "Lesson Plan":
      $typeOfResourceContent = 'mixed material';
      break;
    case "Hyperlink":
      $typeOfResourceContent = 'text';
      break;
      // fcd1, 02/28/14: CLARIFY BELOW
    case "Person":
      $typeOfResourceContent = 'multimedia???';
      break;
    case "Interactive Resource":
      $typeOfResourceContent = 'software, multimedia';
      break;
    }

    if ($typeOfResourceContent) {
      $modsTypeOfResource = $this->_node->appendChild(new Mods_TypeOfResource($typeOfResourceContent));
    }
  
  }

  protected function _mapCulModsCollection(Item $item)
  {
    $culModsCollection = metadata($item, array('MODS', 'Collection'), array('all' => true));

    foreach ($culModsCollection as $collection) {
      $modsRelatedItem = $this->_node->appendChild(new Mods_RelatedItem());
      $modsRelatedItem->setTypeAttribute('host');
      $modsRelatedItem->setDisplayLabelAttribute('Collection');
      $modsRelatedItem->addTitleInfo($collection);
    }
    
  }

  protected function _mapAddtionalItemMetadataProvenance(Item $item)
  {

    $additionalItemMetadataProvenance = metadata($item,
						 array('Additional Item Metadata', 'Provenance'),
						 array('all' => true));

    foreach ($additionalItemMetadataProvenance as $provenance) {
      $modsNote = $this->_node->appendChild(new Mods_Note($provenance));
      $modsNote->setTypeAttribute('ownership');
    }
  
  }

  protected function _mapAddtionalItemMetadataSpatialCoverage(Item $item)
  {

    $additionalItemMetadataSpatialCoverage = metadata($item,
						      array('Additional Item Metadata', 'Spatial Coverage'),
						      array('all' => true));

    foreach ($additionalItemMetadataSpatialCoverage as $spatialCoverage) {
      $modsSubject = $this->_node->appendChild(new Mods_Subject());
      $modsSubject->addGeographic($spatialCoverage);
    }
  
  }

  protected function _map(Item $item)
  {

    $this->_createRecordInfo($item);
    $this->_mapOmekaItemId($item);
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
    $this->_mapCulModsRepositoryName($item);
    $this->_mapCulModsPhysicalDescription($item);
    $this->_mapCulModsFormGenre($item);
    $this->_mapItemTypeMetadataItemType($item);
    $this->_mapCulModsCollection($item);
    $this->_mapAddtionalItemMetadataProvenance($item);
    $this->_mapAddtionalItemMetadataSpatialCoverage($item);

  }

}
