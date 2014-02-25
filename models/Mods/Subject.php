<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: A term or phrase representing the primary topic(s) 
   on which a work is focused.
   Application: "subject" is a wrapper tag that binds together subelements
  */
class Mods_Subject extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('subject');
  }

  public function addTopic($topicContent)
  {
    if (!$topicContent) {
      return null;
    }

     $topicSubelement = new Mods_Topic($topicContent);
    
    if ($topicSubelement) {
      $this->appendChild($topicSubelement);
    }
    return $topicSubelement;
  }

  public function addGeographic($geographicContent)
  {
    if (!$geographicContent) {
      return null;
    }

     $geographicSubelement = new Mods_Geographic($geographicContent);
    
    if ($geographicSubelement) {
      $this->appendChild($geographicSubelement);
    }
    return $geographicSubelement;
  }

}