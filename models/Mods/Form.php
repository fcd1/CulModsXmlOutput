<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: a designation of a particular physical presentation of a resource.
   Application: "form" includes information that specifies the physical form or
   medium of material for a resource. Either a controlled list of values or
   free text may be used.
  */
class Mods_Form extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('form',$content);
  }
}