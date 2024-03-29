<?php
/**
 * Description of IncidentModel
 *
 * @author Aviendha
 */
class FormView extends View
{
    public function outputTitle()
    {
        return $this->model->title;
    }
    
    public function output()
    {
        $title = $this->model->title;
        
   if ($this->route == "register")
   {
                ?>





<div>
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<form action="?route=<?php echo $this->route?>&action=register" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="Enter Username" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="passwordrepeat" class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" value=submit class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="http://aesais.net/?route=login">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->
<?php	
   }
else
{?>
<div>
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Log In</h4>
	<form action="?route=<?php echo $this->route?>&action=login" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="Enter Username" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Enter Password" type="password">
    </div> <!-- form-group// -->                                     
    <div class="form-group">
        <button type="submit" value=submit class="btn btn-primary btn-block"> Login</button>
    </div> <!-- form-group// -->      
    <p class="text-center">Don't have an account? <a href="http://aesais.net/?route=register">Register</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->
<?php
}
    }        
}