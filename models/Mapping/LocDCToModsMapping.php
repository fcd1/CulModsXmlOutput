<?php
  /**
   * This class attempts to implement the Dublin Core to Mods Mapping, version 3,
   * as specifed by the Library of Congress:
   * http://www.loc.gov/standards/mods/dcsimple-mods.html
   */
class Mapping_LocDCToModsMapping extends Mapping_MappingAbstract
{

  // fcd1, 02/25/14:
  // The originInfo MODS elements contains subelements that map to different DC elements,
  // therefore these subelements will be set at different times.
  // However, these subelements should all be in the same instance of originInfo, instead
  // of creating a new originInfo each time - though the MODS description does not explicitly
  // disallow multiple instance of originInfo with a mods element, and the
  // DLF/Aquifer Implementation Guidelines lists originInfo as repeatable.
  // We will store the first (and only)originInfo that is created, and add subseqent subelements to it.
  protected $_originInfo;

  // The DLF/Aquifer Implementation Guidelines lists physicalDescription as non-repeatable
  protected $_physicalDescription;

  public function __construct(Item $item,
                              $context,
                              $onlyOneItem)
  {
    $this->_originInfo = null;
    $this->_physicalDescription = null;
    parent::__construct($item, $context, $onlyOneItem);
  }

  protected function _mapTitle(Item $item)
  {
    $dcTitle = metadata($item, array('Dublin Core', 'Title'), array('all' => true));

    foreach ($dcTitle as $title) {
      $modsTitleInfo = $this->_node->appendChild(new Mods_TitleInfo());
      $modsTitle = $modsTitleInfo->addTitle($title);
    }

  }

  protected function _mapCreator(Item $item)
  {
    $dcCreator = metadata($item, array('Dublin Core', 'Creator'), array('all' => true));

    foreach ($dcCreator as $creator) {
      $modsName = $this->_node->appendChild(new Mods_Name());
      $modsNamePart = $modsName->addNamePart($creator);
      $modsRole = $modsName->appendChild(new Mods_Role());
      $modsRole->addRoleTerm('creator','text');
    }
    
  }

  protected function _mapSubject(Item $item)
  {
    $dcSubject = metadata($item, array('Dublin Core', 'Subject'), array('all' => true));

    foreach ($dcSubject as $subject) {
      $modsSubject = $this->_node->appendChild(new Mods_Subject());
      $modsTopic = $modsSubject->addTopic($subject);
      // fcd1, 02/25/14:
      // just for testing, use addTopic as the default
      // $modsGeographic = $modsSubject->addGeographic($subject);
    }

  }

  protected function _mapDescription(Item $item)
  {
    $dcDescription = metadata($item, array('Dublin Core', 'Description'), array('all' => true));

    foreach ($dcDescription as $description) {
      $modsNote = $this->_node->appendChild(new Mods_Note($description));
      }

  }

  protected function _mapPublisher(Item $item)
  {
    $dcPublisher = metadata($item, array('Dublin Core', 'Publisher'), array('all' => true));

    // Check to see if we alread have an originInfo
    if ( ($dcPublisher) && (!$this->_originInfo) ) {
      $this->_originInfo = $this->_node->appendChild(new Mods_OriginInfo());
    }

    foreach ($dcPublisher as $publisher) {
      $modsPublisher = $this->_originInfo->addPublisher($publisher);
      }

  }

  protected function _mapContributor(Item $item)
  {
    $dcContributor = metadata($item, array('Dublin Core', 'Contributor'), array('all' => true));

    foreach ($dcContributor as $contributor) {
      $modsName = $this->_node->appendChild(new Mods_Name());
      $modsNamePart = $modsName->addNamePart($contributor);
    }
    
  }

  protected function _mapDate(Item $item)
  {
    $dcDate = metadata($item, array('Dublin Core', 'Date'), array('all' => true));

    // Check to see if we alread have an originInfo
    if ( ($dcDate) && (!$this->_originInfo) ) {
      $this->_originInfo = $this->_node->appendChild(new Mods_OriginInfo());
    }

    foreach ($dcDate as $date) {
      $modsDateOther = $this->_originInfo->addDateOther($date);
      }

  }

  protected function _mapType(Item $item)
  {
    $dcType = metadata($item, array('Dublin Core', 'Type'), array('all' => true));

    foreach ($dcType as $type) {
      $modsGenre = $this->_node->appendChild(new Mods_Genre($type));
    }
    
  }

  protected function _mapFormat(Item $item)
  {
    $dcFormat = metadata($item, array('Dublin Core', 'Format'), array('all' => true));

    // Check to see if we alread have an originInfo
    if ( ($dcFormat) && (!$this->_physicalDescription) ) {
      $this->_physicalDescription = $this->_node->appendChild(new Mods_PhysicalDescription());
    }

    foreach ($dcFormat as $format) {
      $modsForm = $this->_physicalDescription->addForm($format);
      }

  }

  // According to the Dublin Core Metadata Element Set Mapping to MODS Version 3
  // (http://www.loc.gov/standards/mods/dcsimple-mods.html)
  // a DC Identifier value that starts with 'http://' should map to MODS <location><url>
  // by default (just default behavior specified by above document, not required).
  // All other values we decided to map to MODS <identifier type='local'> by default,
  // since we have no idea which standard or set of codes is used to generate the identifier
  protected function _mapIdentifier(Item $item)
  {
    $dcIdentifier = metadata($item, array('Dublin Core', 'Identifier'), array('all' => true));

    foreach ($dcIdentifier as $identifier) {
      if (strpos($identifier,'http://') === 0) {
	$modsLocation = $this->_node->appendChild(new Mods_Location());
	$modsUrl = $modsLocation->addUrl($identifier);
      } else {
	$modsIdentifier = $this->_node->appendChild(new Mods_Identifier($identifier));
	$modsIdentifier->setTypeAttribute('local');
      }
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
  }

}
