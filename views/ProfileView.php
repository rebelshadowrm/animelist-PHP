<?php
/**
 * Description of IncidentModel
 *
 * @author Aviendha
 */
class ProfileView extends View
{
    
    public function output()
    {
        $title = $this->model->title;
		if((isset($this->model->ListItems) && $this->model->ListItems[0]->userloginid != 0) || $this->model->selfprofile )
		{
?>		
        
 
<div>
	<div>
		<h1 class="h1">
			<a class="header-right mt4 mr0" href="" style="font-size: 12px;"><i class="fa fa-cog mr4"></i>Edit Profile</a><span class="di-ib po-r">
			<?php echo $this->model->selfprofile ? ucfirst($_SESSION['username']) : $this->model->ListItems[0]->getUsername() ;?>'s Profile 
			</span>              
		</h1>
	</div>
	<div id="content">
		<div class="content-container">
			<div class="container-left">
				<div class="user-profile">
					<ul class="user-status border-top pb8 mb4">
						<li class="clearfix"><span class="user-status-title di-ib fl-l fw-b">Last Online</span><span class="user-status-data di-ib fl-r online">Now</span></li>
						<li class="clearfix"><span class="user-status-title di-ib fl-l fw-b">Joined</span><span class="user-status-data di-ib fl-r">Oct 26, 2013</span></li>
					</ul>
					<div class="user-button clearfix mb12">
						<a class="btn-profile-submit fl-l"  href="/?route=animelist&action=view&p1=<?php echo $this->model->selfprofile ? $_SESSION['userloginid'] :
						$this->model->ListItems[0]->userloginid;  ?>">AnimeList</a>
						<a class="btn-profile-submit fl-r" href="">Manga List</a>
					</div>
					<ul class="user-status border-top">
						<li class="icon-statistics link"><a href="" class="di-b"><span class="user-status-title di-ib fw-b">Statistics</span></a></li>
						<li class="icon-history link"><a href=""><span class="user-status-title di-ib fw-b w100">History</span></a></li>
					</ul>
					<h4><a href="" class="fl-r fs11 fw-n ff-Verdana">All (3)</a>Friends</h4>
					<h4>Also Available at</h4>
					<div class="user-profile-sns">
						Nothing yet. <a href="">Add links</a>.
					</div>
				</div>
			</div>
			<div class="container-right">
				<div class="user-profile-about">
					No biography yet. <a href="">Write it now</a>.
				</div>
				<div class="user-statistics mb24" id="statistics">
					<h2>Statistics</h2>
					<div class="user-statistics-stats mt16">
						<div class="stats anime">
							<h5>Anime Stats</h5>
							<div class="stat-score di-t w100 pt8">
								<div class="di-tc al pl8 fs12 fw-b"><span class="fn-grey2 fw-n">Days: </span>180.1</div>
								<div class="di-tc ar pr8 fs12 fw-b"><span class="fn-grey2 fw-n">Mean Score: </span>6.07</div>
							</div>
							<h5>
								<a class="floatRightHeader ff-Verdana" href="">Anime History</a>
								Last Anime Updates
							</h5>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
		}
		else if(isset($this->model->ListItems) && $this->model->ListItems[0]->userloginid == 0) 
				{
		?>
					
					<div class="row">
					<div class="col-md-12">
					<div class="error-template">
					<h1>404 Not Found</h1></div></div></div>
		<?php
					return;
				}
			?>    

 <?php
}        
}