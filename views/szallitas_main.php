
    <div class="balold" id="balold">
			<div class="valaszt">
        <form name="szolgvalaszt" action="<?= SITE_ROOT ?>szallitas" method="POST">
          <h1>Hulladékelszállítási Időpontok</h1>
          <select name="szolgaltatas" onchange="javascript:szolgvalaszt.submit();">
            <option value="">Válassza ki a hulladék típusát...</option>
            <?php
              foreach($_SESSION['szolgaltatas']->szolgaltatas as $szolg)
              {
                echo '<option value="'.$szolg['id'].'">'.$szolg['jelentes'].'</option>';
              }
            ?>
          </select>
        </form>
        <form name="lakigvalaszt" action="<?= SITE_ROOT ?>szallitas" method="POST">
          <select name="lakig" onchange="javascript:lakigvalaszt.submit();">
            <option value="">Mikor szeretné elszállíttatni...</option>
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
            <h1>Legközelebbi Szállítási Időpontok</h1>
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
