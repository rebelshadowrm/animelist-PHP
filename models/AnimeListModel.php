<?php

class AnimeListModel extends Model
{
    public $ListItems;
    public function __construct() 
    {
        parent::__construct();
        $this->text = "";
	
    }     
	
	public function setlistitems($ListItems)
	{
		$this->ListItems=$ListItems;
		$this->title = $this->ListItems[0]->Member->getUsername();
	}
	
}
