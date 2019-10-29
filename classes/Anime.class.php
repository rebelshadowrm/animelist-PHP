<?php
class Anime
{
    private $animeid;
	private $title;
	private $epcount;
	private $AnimeType;
    
    function __construct($animeid, $title, $epcount, $AnimeType) 
	{
        $this->animeid = $animeid;
		$this->title = $title;
		$this->epcount = $epcount;
		$this->AnimeType = $AnimeType;
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
