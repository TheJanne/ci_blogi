<form class="login" action="<?php print site_url();?>/kayttaja/kirjautuminen" method="post">
    <div class="form-group">
        <label for="tunnuskentta">Käyttäjänimi</label>
        <?php echo form_error("tunnus")?>
        <input name="tunnus" id="tunnuskentta" value="<?php set_value("tunnus")?>" class="form-control">

        <label for="salasanakentta">Salasana</label>
        <?php echo form_error("salasana") ?>
        <input name="salasana" id="salasanakentta" value="<?php set_value("salasana")?>" type="password" class="form-control">
        <br>
        <input class="btn btn-primary" type="submit" value="login">
    </div>
</form>