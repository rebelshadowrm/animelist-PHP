<?php
class AnimeStatusType
{
    private $statusid;
	private $statusname;
    
    function __construct($statusid, $statusname) 
	{
        $this->statusid = $statusid;
		$this->statusname = $statusname;
    }
    
     public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

    public function __toString() 
	{
        
    }

}
