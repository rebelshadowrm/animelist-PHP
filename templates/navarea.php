<nav>
    <ul class = "navbtn">
        <li><a href="./?route=index">Home</a></li>
        <li><a href="./?route=userlist&action=viewuserlist">Userlist</a></li>
       
  <?php 
  if ($frontController->IsLoggedIn())
    { 
       ?>
       <li style='float:right'><a href="./?route=index&action=logout">Logout</a></li>
	   <li class='username'><a href="./?route=profile"> <?php echo ucfirst($_SESSION['username']);?></a></li>
	  <?php
    }
  else
    {
      ?> <li style='float:right'><a href="./?route=login">Login</a>
	  <li style='float:right'><a href="./?route=register">Register</a></li>
	  <?php
    }
  ?>
    </ul>
</nav>

