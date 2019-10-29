<?php 
class Project3DB
{
    protected $connection;
    
    // connect to db
    public function __construct()
    {
        try 
        {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_SCHEMA . ";", DB_USERNAME, DB_PASSWORD);
        } 
        catch (PDOException $e) 
        {
            echo ($e->getMessage());
        }
    }
    
    // disconnect from db
    public function Disconnect()
    {
        $this->connection = NULL;
    }
	
    public function register($username, $password)
    { 
        try 
        {
			if($this->doesuserexist($username))
			{
				return false;
			}
			
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $this->connection->prepare('INSERT INTO userlogin (userloginname, password, registerdate) VALUES(:username, :password, now() )');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            
            $success = $stmt->execute();
			
            return $success;
       } 
       catch (PDOException $Exception) 
       {
            print ($Exception);
       }
    }
    
    public function login($username, $password)
    {	
        try
        {
           $stmt = $this->connection->prepare('SELECT * FROM userlogin WHERE userloginname = :username');
           $stmt->execute(array(
                            ':username' => $username
                                ));
           
            if ($stmt->rowCount() > 0)
            {
                $user = $stmt->fetch();
                if(password_verify($password, $user['password']))
                {
                    $member = new Member($user["userloginname"],$user["userloginid"]);
                    return $member;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
        }	
    }
	
	public function doesuserexist($username)
	{
		 $stmt = $this->connection->prepare('SELECT * FROM userlogin WHERE userloginname = :username');
           $stmt->execute(array(
                            ':username' => $username
                                ));
           
            return $stmt->rowCount() > 0;
            
	}
	
    public function addSection($page, $title, $content, $imagepath = "")
    {
        try
        { 
            $stmt = $this->connection->prepare('INSERT INTO pagecontent (pageid, title, content, imagepath) '
                                            . 'VALUES ((SELECT id FROM pages WHERE displayname = :page), '
                                            . ':title, '
                                            . ':content, '
                                            . ':imagepath)');
            $success = $stmt->execute(array(
                            ':page' => $page,
                            ':title' => $title,
                            ':content' => $content,
                            ':imagepath' => $imagepath
                                ));
           
            return $success;
           
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
        }	
    }
    
    public function getAnimeList($userid)
    {
        try
        {
           $stmt = $this->connection->prepare('SELECT * FROM idincludedanimelist '
                                                . 'WHERE userid = :userid');
           $stmt->execute(array(
                            ':userid' => $userid
                                ));
            if ($stmt->rowCount() > 0)
            {
                $data = $stmt->fetchAll();
				
                foreach ($data as $items)
                {
                    $member=new Member($items['username'],$items['userid']);
					$animetype=new AnimeType($items['typeid'],$items['typename']);
					$Anime=new Anime($items['animeid'],$items['title'],$items['epcount'],$animetype);
					$statustype=new AnimeStatusType($items['statusid'],$items['statusname']);
                    $ListItem = new ListItem($member,$Anime,$statustype,$items['progress'],$items['rating']);
                    $ListItems[] = $ListItem;
                }
                
                return $ListItems;
            }
            else
            {
                return NULL;
            }
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
			return NULL;
        }	
    }
	
	public function getProfileinformation($userid)
	{
        try
        {
           $stmt = $this->connection->prepare('SELECT * FROM aggregateduserstats '
                                                . 'WHERE userid = :userid');
           $stmt->execute(array(
                            ':userid' => $userid
                                ));
            if ($stmt->rowCount() > 0)
            {
                $data = $stmt->fetchAll();
				
                foreach ($data as $items)
                {
                    $member=new Member($items['username'],$items['userid']);
                    $ListItems[] = $member;
                }
                
                return $ListItems;
            }
            else
            {
				$ListItems[] = new Member("404 Not Found",0);
                return $ListItems;
            }
        }
        catch( PDOException $Exception) 
        {
            print($Exception);
			return NULL;
        }	
    }
	
	public function getUserinformation()
	{
		try
		{
			$stmt = $this->connection->prepare('SELECT * FROM users');
			
			$stmt->execute();
		
			if($stmt->rowCount() > 0)
			{
				$data = $stmt->fetchAll();
				
				foreach($data as $items)
				{
					$members=new Member($items['username'],$items['userid']);
					$ListItems[] = $members;
				}	
				
				return $ListItems;
				
			}
			else
			{
				return NULL;
			}	
		}
		catch( PDOException $Exception)	
		{
			print($Exception);
			return NULL;
		}
	}	
 
    public function updateSection($section, $title, $content, $imagepath = "")
    {
        try 
        {
            $stmt = $this->connection->prepare('UPDATE pagecontent '
                                               . 'SET title = :title, '
                                               . 'content = :content, '
                                               . 'imagepath = :imagepath '
                                               . 'WHERE contentid = :sectionid');
            $success = $stmt->execute(array(
                ':sectionid' => $section,
                ':title' => $title,
                ':content' => $content,
                ':imagepath' => $imagepath
                        ));
            
            return $success;
       } 
       catch (PDOException $Exception) 
       {
            print ($Exception);
            return false;
       }
       return false;
    }

    public function removeSection($sectionID)
    {
        try 
        {
            $stmt = $this->connection->prepare('DELETE FROM pagecontent '
                                               . 'WHERE contentid = :contentid');
            $success = $stmt->execute(array(
                             ':contentid' => $sectionID
                                ));
            return $success;
       } 
       catch (PDOException $Exception) 
       {
            print ($Exception);
            return false;
       }
       return false;
    }
    
    
}

?>