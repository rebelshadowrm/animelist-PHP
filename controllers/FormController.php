<?php
/**
 * Description of incident
 *
 * @author Aviendha
 */
class FormController extends Controller 
{
    public function __construct(Model $model) {
        parent::__construct($model);
        $this->model->title = ucfirst(htmlentities($_GET['route']));
    }


    public function register()
    {
        $username = preg_replace("/[^A-Za-z0-9]/", "", $_POST['username']);
        $password = $_POST['password'];
        $passwordrepeat = $_POST['passwordrepeat'];
        if((strlen(trim($username)) <6 || strlen(trim($password)) <6)||$password != $passwordrepeat)
		{
			header('Location: ./?route=register' );
		}	
		else
		{
		$db = new Project3DB();
			if($db->register($username, $password))
			{
				$this->trylogin($username, $password);
			}			
		}
    }
    
	
	private function trylogin($username, $password)
	{
		 $db = new Project3DB();
        
        $member = $db->login($username, $password);
        
        if ($member)
        {
            $_SESSION['username'] = $member->getUsername();
            $_SESSION['userloginid'] = $member->userloginid;
			
            header( 'Location: ./?route=profile' );
        }
	}
	
	
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $this->trylogin($username, $password);
    }
}
