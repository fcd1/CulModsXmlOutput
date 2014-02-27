<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: a designation of the source of a digital file 
   important to its creation, use and management.
  */
class Mods_DigitalOrigin extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {

    // MODS element digitalOrigin can only have the following content
    if ( ($content !== 'born digital')
	 &&
	 ($content !== 'reformatted digital')
	 &&
	 ($content !== 'digitized microfilm')
	 &&
	 ($content !== 'digitized other analog') ) {
      return null;
    }

    parent::__construct('digitalOrigin',$content);

  }

}