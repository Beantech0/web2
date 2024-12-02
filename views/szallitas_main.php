
    <div class="balold" id="balold">
			<div class="valaszt">
        <form name="szolgvalaszt" action="<?= SITE_ROOT ?>szallitas" method="POST">
          <h4>Hulladékelszállítási Időpontok</h4>
          <select name="szolgaltatas" class="form-control" onchange="javascript:szolgvalaszt.submit();">
            <option class="form-control" value="">Válassza ki a hulladék típusát...</option>
            <?php
              foreach($_SESSION['szolgaltatas']->szolgaltatas as $szolg)
              {
                echo '<option value="'.$szolg['id'].'">'.$szolg['jelentes'].'</option>';
              }
            ?>
          </select><br><br>
        </form>
        <h4>Legközelebbi Szállítási Időpontok</h4>
        <form name="lakigvalaszt" action="<?= SITE_ROOT ?>szallitas" method="POST">
          <select class="form-control" name="lakig" onchange="javascript:lakigvalaszt.submit();">
            <option class="form-control" value="">Mikor szeretné elszállíttatni...</option>
            <?php
              foreach($_SESSION['lakig']->lakig as $lak)
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
