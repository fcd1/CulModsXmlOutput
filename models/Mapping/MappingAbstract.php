<?php
abstract class Mapping_MappingAbstract
{

  protected $_doc;

  protected $_node;

  //  public function __construct($record, $context)
  // add another argument later, a bool, set to true if we are only gonna
  // map one item, and we can then use the mods element instead of modsCollection
  // for now, use same signature as construct for AbstractCulOmekaXml
  public function __construct(Item $item,
			      $context,
			      $onlyOneItem = false)
  {
    $this->_doc = new DOMDocument('1.0', 'UTF-8');
    $this->_doc->formatOutput = true;
    $comment = $this->_generatePreambleComment();
    $domComment = $this->_doc->createComment($comment);
    $this->_doc->appendChild($domComment);

    if ($onlyOneItem) {
      $this->_node = $this->_doc->appendChild(new Mods_Mods());
      // $this->_node = $this->_doc->appendChild(new DOMElement('mods'));
    } else {
      $this->_node = $this->_doc->appendChild(new Mods_Mods('modsCollection'));
    }

    $this->_map($item);
	
  }

  abstract protected function _map(Item $item);

  public function getDoc()
  {
    // $this->_doc->appendChild($this->_node);
    return $this->_doc;
  }

  protected function _generatePreambleComment()
  {
     $preambleComment =
       'Hello,'.PHP_EOL;
     $preambleComment .=
       'Fred:'.PHP_EOL;
     return $preambleComment;

  }
}