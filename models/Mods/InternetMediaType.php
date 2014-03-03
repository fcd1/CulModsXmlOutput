<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   an identification of the electronic format type,
   or the data representation of the resource
  */
class Mods_InternetMediaType extends Mods_ModsElementAbstract
{

  public function __construct($content)
  {
    parent::__construct('internetMediaType',$content);
  }

}