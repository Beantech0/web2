<?php
$client = new SoapClient('http://holybaattila.nhely.hu/soap/szerver/hulladekszallitas.wsdl');
?>
    <div class="balold" id="balold">
			<div class="valaszt">
        <form name="szolgvalaszt" action="<?= SITE_ROOT ?>szallitas" method="POST">
          <select name="szolgaltatas" class="form-control" onchange="javascript:szolgvalaszt.submit();">
            <option value="">Válassza ki a hulladék típusát...</option>
            <?php
              
              $szolgaltatas = $client->getszolgaltatas();
              foreach ($szolgaltatas['szolgaltatas'] as $szolgaltatas)
              {
                echo '<option value="' . $szolgaltatas['id'] . '">' . $szolgaltatas['jelentes'] . '</option>';
              }
            ?>
          </select><br>
          <?php
          if(isset($_POST['szolgaltatas'])) {
           echo "Kiválasztott hulladék típus:" .$_POST['szolgaltatas'];
          }
          if(isset($_POST['szolgaltatas'])) {
            print"lefut";
            $lakig = $client->getlakig($_POST['szolgaltatas']);
            print_r($lakig);
         }
          ?>
          <br><br>
        </form>
        <form name="lakigvalaszt" action="<?= SITE_ROOT ?>szallitas" method="POST">
          <select class="form-control" name="lakig" onchange="javascript:lakigvalaszt.submit();">
            <option class="form-control" value="">Mikor szeretné elszállíttatni...</option>
            <?php
              foreach ($lakig['igeny'] as $lak)
              {
                echo '<option>'.$lak['igeny'].'</option>';
              }
            ?>
          </select>
        </form>
      </div>
      <div class="jobbold">
			  <div class="idopontok">
				  <div class="keret">      
            
            <fieldset>
            <?php
              if (isset($_SESSION['naptar']))
              {
                foreach($_SESSION['naptar']->naptar as $datum)
                {
                  echo $datum['datum']."<br>";
                }
              }  
            ?>
            </fieldset>
    		  </div>
			  </div>
		  </div>
      </div>  
