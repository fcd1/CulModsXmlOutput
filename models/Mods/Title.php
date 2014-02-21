<?php
class Mods_Title extends DOMElement
{
  public function __construct($title = null)
  {
    parent::__construct('title',$title);
  }
}