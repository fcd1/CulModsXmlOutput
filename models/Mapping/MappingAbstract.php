<?php
abstract class Mapping_MappingAbstract
{

  protected $_doc;

  protected $_node;

  protected $_modsCollection;

  //  public function __construct($record, $context)
  // add another argument later, a bool, set to true if we are only gonna
  // map one item, and we can then use the mods element instead of modsCollection
  // for now, use same signature as construct for AbstractCulOmekaXml
  public function __construct($context,
			      $onlyOneItem = false)
  {

    $this->_modsCollection = null;
    $this->_doc = new DOMDocument('1.0', 'UTF-8');
    $this->_doc->formatOutput = true;
    $comment = $this->_generatePreambleComment();
    $domComment = $this->_doc->createComment($comment);
    $this->_doc->appendChild($domComment);

    if ($onlyOneItem) {
      $this->_node = null;
      // $this->_node = $this->_doc->appendChild(new Mods_Mods());
    } else {
      $this->_modsCollection = $this->_doc->appendChild(new Mods_ModsCollection());
    }

  }

  abstract public function map(Item $item);

  public function getDoc()
  {
    // $this->_doc->appendChild($this->_node);
    return $this->_doc;
  }

  // Following is used to reset the state as we are about to create a new
  // Mods element. State is used to track if we have certain subelements
  // that can only occur once in a Mods element.
  // IMPORTANT: child needs to call the parents _reset()
  abstract protected function _reset();

  protected function _createModsElement() {

    if ($this->_modsCollection) {
      $this->_node = $this->_modsCollection->appendChild(new Mods_Mods());
    } else {
      $this->_node = $this->_doc->appendChild(new Mods_Mods());
    }

    $this->_reset();

  }

  protected function _generatePreambleComment()
  {
     $preambleComment =
       'Columbia University.'.PHP_EOL;
     $preambleComment .=
       'Following MODS output created via the CulModsXmlOutput running on Omeka server.'.PHP_EOL;
     return $preambleComment;

  }
}