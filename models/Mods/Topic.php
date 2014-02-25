<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "topic" is used as the tag for any topical subjects that are not appropriate
   in the <geographic>, <temporal>, <titleInfo>, or <name> subelements.
   If there is an uncontrolled term, <topic> is used (since <subject> is a
   binding element)
  */
class Mods_Topic extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('topic',$content);
  }
}