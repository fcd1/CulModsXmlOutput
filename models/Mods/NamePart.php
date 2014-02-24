<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   "namePart" includes each part of the name that is parsed. Parsing is used
   to indicate a date associated with the name, to parse the parts of a 
   corporate name (MARC 21 fields X10 subfields $a and $b), or to parse 
   parts of a personal name if desired (into family and given name). 
   The latter is not done in MARC 21. Names are expected to be in a structured 
   form (e.g. surname, forename).
  */
class Mods_NamePart extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('namePart',$content);
  }
}