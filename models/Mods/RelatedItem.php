<?php
  // Following is from the "MODS User Guidelines Version 3"
  // (http://www.loc.gov/standards/mods/v3/mods-userguide.html)
  /* 
   Definition: Information that identifies other resources related
   to the one being described.
   Application: "relatedItem" includes a designation of the specific
   type of relationship as a value of the type attribute and is a controlled
   list of types enumerated in the schema. <relatedItem> is a container
   element under which any MODS element may be used as a subelement. It is
   thus fully recursive.
  */
class Mods_RelatedItem extends Mods_ModsElementAbstract
{
  public function __construct()
  {
    parent::__construct('relatedItem');
  }

  public function setTypeAttribute($value)
  {
    // fcd1, 02/27/14 BEGIN
    // This not test all possible type values (all the 
    // allowed ones, plus a few that are not in the list)
    // For now, only using the 'original' value
    // END 02/27/14, fcd1

    // type attribute for the relatedItem element can only
    // be set to the following values
    if ( ($value !== 'preceding')
	 &&
	 ($value !== 'succeeding')
	 &&
	 ($value !== 'original')
	 &&
	 ($value !== 'host')
	 &&
	 ($value !== 'constituent')
	 &&
	 ($value !== 'series')
	 &&
	 ($value !== 'otherVersion')
	 &&
	 ($value !== 'otherFormat')
	 &&
	 ($value !== 'isReferencedBy') )

      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('type',$value);
    return $value;
  }
  public function setDisplayLabelAttribute($value)
  {
    if ($value) {
      $this->setAttribute('displayLabel',$value);
    }
    return $value;
  }

  public function addTitleInfo($title)
  {
    if (!$title) {
      return null;
    }

    $titleInfoSubelement = new Mods_TitleInfo();

    if ($titleInfoSubelement) {
      $this->appendChild($titleInfoSubelement);
      $titleSubSubelement = $titleInfoSubelement->addTitle($title);
    }

    return $titleInfoSubelement;
  }

}