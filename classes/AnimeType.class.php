<?php
class AnimeType
{
    private $typeid;
	private $typename;
    
    function __construct($typeid, $typename) 
	{
        $this->typeid = $typeid;
		$this->typename = $typename;
    }
    
     public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

    public function __toString() 
	{
        return $this->gettypename();
    }

}
