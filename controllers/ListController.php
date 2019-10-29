<?php
/**
 * Description of incident
 *
 * @author Aviendha
 */
 
class ListController extends Controller 
{
    public function __construct(Model $model) {
        parent::__construct($model);
    }

	public function view($userid)
	{
		$db = new Project3DB();
		$this->model->setlistitems($db->getAnimeList($userid));
	}
	
	public function viewuserlist()
	{
		$db = new Project3DB();
		$this->model->setlistitems($db->getUserinformation());
	}
}
