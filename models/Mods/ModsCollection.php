<?php
class Mods_ModsCollection extends Mods_ModsElementAbstract
{
    protected function _buildNode()
    {

        $itemContainerElement = $this->_createElement('Pickles');
      /*
	// fcd1, 02/14/14:
	// We don't want pagination info because we want all items on one page.
	// In the "Appearance" section of the admin page, set the
	// "Results per page (admin) to a large enough number
        // $this->_setContainerPagination($itemContainerElement);
        
        foreach ($this->_record as $item) {
            $itemOmekaXml = new Output_ItemCulOmekaXml($item, $this->_context);
            $itemElement = $this->_doc->importNode($itemOmekaXml->_node, true);
            $itemContainerElement->appendChild($itemElement);
        }
      */
        $this->_node = $itemContainerElement;


    }
}
