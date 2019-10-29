<?php
class Member 
{
    private $username;
	private $userloginid;
    
    function __construct($username, $userloginid) 
	{
        $this->username = $username;
		$this->userloginid = $userloginid;
    }
	
	      public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }
    
	
    public function getUsername() 
	{
        return ucfirst($this->username);
    }

    function setUsername($username) 
	{
        $this->username = $username;
    }

    public function __toString() 
	{
        
    }

}
