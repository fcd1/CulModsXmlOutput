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

  protected function _map(Item $item)
  {
    $this->_mapTitle($item);
    $this->_mapCreator($item);
    $this->_mapSubject($item);
    $this->_mapDescription($item);
  }

}
