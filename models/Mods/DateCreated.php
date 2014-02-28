<?php
class Mods_DateCreated extends Mods_ModsElementAbstract
{
  public function __construct($content)
  {
    parent::__construct('dateCreated',$content);
  }

  public function setEncodingAttribute($value)
  {
    // encoding attribute for the dateCreated element can only
    // be set to the following values
    if ( ($value !== 'w3cdtf')
	 &&
	 ($value !== 'iso8601')
	 &&
	 ($value !== 'marc') )
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('encoding',$value);
    return $value;
  }

  public function setPointAttribute($value)
  {
    // encoding attribute for the dateCreated element can only
    // be set to the following values
    if ( ($value !== 'start')
	 &&
	 ($value !== 'end') )
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('point',$value);
    return $value;
  }

  public function setKeyDateAttribute($value)
  {
    // keyDate attribute for the dateCreated element can only
    // be set to the following values
    if ($value !== 'yes')
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('keyDate',$value);
    return $value;
  }

  public function setQualifierAttribute($value)
  {
    // qualifier attribute for the dateCreated element can only
    // be set to the following values
    if ( ($value !== 'approximate')
	 &&
	 ($value !== 'inferred')
	 &&
	 ($value !== 'questionable') )
      {
	// for now, just return null.
	// later, may want to add mechanism (exception?)
	// to notify caller that value was invalid
	return null;
      }

    $this->setAttribute('qualifier',$value);
    return $value;
  }

}