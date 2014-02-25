<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "geographic" is used for geographic subject terms that are not parsed 
   as hierarchical geographics
  */
class Mods_Geographic extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('geographic',$content);
  }
}