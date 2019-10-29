<?php
/**
 * @author Aviendha
 */
class ProfileController extends Controller 
{
    public function __construct(Model $model) 
    {
        parent::__construct($model);
    }

    public function view($userid=0)
	{
		$db= new Project3DB();
		$this->model->setlistitems($db->getProfileinformation($userid));
	}
	
	
   
}

