<?php
class ListItem
{
    private $Member;
	private $Anime;
	private $AnimeStatusType;
	private $progress;
	private $rating;
    
    function __construct($Member, $Anime, $AnimeStatusType, $progress, $rating) 
	{
        $this->Member = $Member;
		$this->Anime = $Anime;
		$this->AnimeStatusType = $AnimeStatusType;
		$this->progress = $progress;
		$this->rating = $rating;
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
