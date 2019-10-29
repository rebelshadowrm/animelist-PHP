<?php

class UserListModel extends Model
{
    public $ListItems;
    public function __construct() 
    {
        parent::__construct();
        $this->text = "";
		$this->title = 'userlist';
	
    }     
	
	public function setlistitems($ListItems)
	{
		$this->ListItems=$ListItems;
		
	}
	
}