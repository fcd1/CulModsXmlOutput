<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   A term(s) that designates a category characterizing a particular style,
   form, or content, such as artistic, musical, literary composition, etc
  */
class Mods_Genre extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('genre',$content);
  }
}