<?php

class ProfileModel extends Model
{
    public $ListItems;
	public $selfprofile = true;
	
    public function __construct() 
    {
        parent::__construct();
        $this->text = "";
		if(isset($_SESSION['username']))
		{
			$this->title = $_SESSION['username'] . "'s Profile";
		}
    }     
	
	public function setlistitems($ListItems)
	{
		$this->selfprofile = false;
		$this->ListItems=$ListItems;
		$this->title = $this->ListItems[0]->getUsername() . "'s Profile";
	}
	
}
