<?php

class Router
{
    private $table = array();
    
    public function __construct() 
    {
        $this->table['index'] = new Route('Model', 'View', 'Controller');
        $this->table['userlist'] = new Route('UserListModel', 'UserListView', 'ListController');
        $this->table['register'] = new Route('FormModel', 'FormView', 'FormController');
        $this->table['login'] = new Route('FormModel', 'FormView', 'FormController');
		$this->table['profile']=new Route('ProfileModel','ProfileView','ProfileController');
		$this->table['animelist']=new Route('AnimeListModel','AnimeListView','ListController');
    }
    
    public function getRoute($route) 
    {
        $route = strtolower($route);

        //Return a default route if no route is found
        if (!isset($this->table[$route])) {
            return $this->table['index'];    
        }
        
        return $this->table[$route];        
    } 
	
	

}
  