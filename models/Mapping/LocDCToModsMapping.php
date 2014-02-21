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

    $titleInfo = $this->_node->appendChild(new Mods_TitleInfo());
    
    $titleInfo->appendChild(new Mods_Title($titleText));

  }

  protected function _map(Item $item)
  {
    $this->_mapTitle($item);
  }

}
