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

    $creatorText = metadata($item, array('Dublin Core', 'Creator'));

    $modsName = $this->_node->appendChild(new Mods_Name());

    $modsNamePart = $modsName->addNamePart($creatorText);

  }

  protected function _map(Item $item)
  {
    $this->_mapTitle($item);
  }

}
