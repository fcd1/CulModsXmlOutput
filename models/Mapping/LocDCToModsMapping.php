<?php
  /**
   * This class attempts to implement the Dublin Core to Mods Mapping, version 3,
   * as specifed by the Library of Congress:
   * http://www.loc.gov/standards/mods/dcsimple-mods.html
   */
class Mapping_LocDCToModsMapping extends Mapping_MappingAbstract
{

  protected function _mapTitle(Item $item)
  {
    $titleText = metadata($item, array('Dublin Core', 'Title'));

    $modsTitleInfo = $this->_node->appendChild(new Mods_TitleInfo());

    $modsTitle = $modsTitleInfo->addTitle($titleText);

  }

  protected function _mapCreator(Item $item)
  {
    $creatorText = metadata($item, array('Dublin Core', 'Creator'));

    $modsName = $this->_node->appendChild(new Mods_Name());

    $modsNamePart = $modsName->addNamePart($creatorText);

    $modsRole = $modsName->appendChild(new Mods_Role());

    $modsRole->addRoleTerm('creator','text');
    
  }

  protected function _mapSubject(Item $item)
  {
    $subjectText = metadata($item, array('Dublin Core', 'Subject'));

    $modsSubject = $this->_node->appendChild(new Mods_Subject());

    $modsTopic = $modsSubject->addTopic($subjectText);

    // fcd1, 02/25/14:
    // just for testing, use addTopic as the default
    $modsGeographic = $modsSubject->addGeographic($subjectText);

  }

  protected function _map(Item $item)
  {
    $this->_mapTitle($item);
    $this->_mapCreator($item);
    $this->_mapSubject($item);
  }

}
