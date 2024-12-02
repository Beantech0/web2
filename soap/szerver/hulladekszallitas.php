<?php

class Hulladekszallitas
{

  /**
    *  @return Szolgaltatas
    */
  public function getszolgaltatas()
  {
    $eredmeny = array("hibakod" => 0,
					            "uzenet" => "",
					            "szolgaltatas" => Array());
	
	  try
    {
      $dbh = new PDO('mysql:host=localhost;dbname=hulladekszallitas','root', '',
		                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
      $sql = "SELECT id, jelentes FROM szolgaltatas";
      $sth = $dbh->prepare($sql);
	    $sth->execute(array());
	    $eredmeny['szolgaltatas'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	  }
	  catch (PDOException $e)
    {
	    $eredmeny["hibakod"] = 1;
	    $eredmeny["uzenet"] = $e->getMessage();
	  }
	
	  return $eredmeny;
  }

  /**
    *  @param integer
    *  @return Lakig
    */
  function getlakig($id)
  {
  
	  $eredmeny = array("hibakod" => 0,
					            "uzenet" => "",
                      "id" => "",
                      "jelentes" => "",
                      "lakig" => Array());
	
    try
    {
      $dbh = new PDO('mysql:host=localhost;dbname=hulladekszallitas','root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

      $eredmeny["id"] = $id;

      $sql = "select jelentes from szolgaltatas where id = :id";
	    $sth = $dbh->prepare($sql);
	    $sth->execute(array(":id" => $id));
	    $szolg = $sth->fetch(PDO::FETCH_ASSOC);
	    $eredmeny["jelentes"] = $szolg["jelentes"];

      $sql = "select igeny from lakig where szolgid = $id";
      $sth = $dbh->prepare($sql);
      $sth->execute(array());
      $eredmeny['lakig'] = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e)
    {
      $eredmeny["hibakod"] = 1;
      $eredmeny["uzenet"] = $e->getMessage();
    }
                 
    return $eredmeny;
  }

  /**
    *  @param string
    *  @return Naptar
    */
    function getnaptar($igeny)
    {
    
      $eredmeny = array("hibakod" => 0,
                        "uzenet" => "",
                        "id" => "",
                        "igeny" => "",
                        "naptar" => Array());
    
      try
      {
        $dbh = new PDO('mysql:host=localhost;dbname=hulladekszallitas','root', '',
                      array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $eredmeny["igeny"] = $igeny;

        $sql = "select szolgid from lakig where igeny = :igeny";
	      $sth = $dbh->prepare($sql);
	      $sth->execute(array(":igeny" => $igeny));
	      $szolg = $sth->fetch(PDO::FETCH_ASSOC);
	      $eredmeny["id"] = $szolg["szolgid"];
        $id = $eredmeny['id'];

        $sql = "select datum from naptar where szolgid = $id and datum >= '$igeny' limit 4";
	      $sth = $dbh->prepare($sql);
        $sth->execute(array());
        $eredmeny['naptar'] = $sth->fetchAll(PDO::FETCH_ASSOC);
      }
      catch (PDOException $e)
      {
        $eredmeny["hibakod"] = 1;
        $eredmeny["uzenet"] = $e->getMessage();
      }
                   
      return $eredmeny;
    }
}

class Szolgaltatas {
  /**
   * @var integer
   */
  public $hibakod;
  
  /**
   * @var string
   */
  public $uzenet;

  /**
   * @var Szolgaltatas[]
   */
  public $szolgaltatas;  
}

class Lakig {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;

  /**
   * @var integer
   */
  public $id;

  /**
   * @var string
   */
  public $jelentes;

  /**
   * @var Lakig[]
   */
  public $lakig;  
}

class Naptar {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;

  /**
   * @var integer
   */
  public $id;

  /**
   * @var string
   */
  public $igeny;

  /**
   * @var Naptar[]
   */
  public $naptar;  
}

?>