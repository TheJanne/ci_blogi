<form class="login" action="<?php print site_url();?>/kayttaja/rekistoroidy" method="post">
    <div class="form-group">
        <h1>Rekistöröityminen</h1>       
        
        <label>Etunimi</label>
        <?php echo form_error("etunimi") ?>
        <input name="etunimi" id="etunimikentta" value="<?php set_value("etunimi")?>" type="text" class="form-control">

        <label>Sukunimi</label>
        <?php echo form_error("sukunimi") ?>
        <input name="sukunimi" id="sukunimikentta" value="<?php set_value("sukunimi")?>" type="text" class="form-control">

        <label>Sähköposti</label>
        <?php echo form_error("email") ?>
        <input name="email" id="emailkentta" value="<?php set_value("email")?>" type="text" class="form-control">

        <label>Käyttäjänimi</label>
        <?php echo form_error("tunnus")?>
        <input name="tunnus" id="tunnuskentta" value="<?php set_value("tunnus")?>" class="form-control">
 
        <label>Salasana</label>
        <?php echo form_error("salasana") ?>
        <input name="salasana" id="salasanakentta" value="<?php set_value("salasana")?>" type="password" class="form-control">        
        <br>
        <input class="btn btn-primary" type="submit" value="Lähetä">
    </div>
</form>