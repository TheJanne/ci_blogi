<form method="POST" action="<?php print site_url();?>/kirjoitus/tallenna_kirjoitus/">
    <h1>Lisää kirjoitus</h1>
    <p>Otsikko</p>
    <input name="otsikko" type="text"/>
    <p>Mitä haluat kertoa?</p>
    <textarea name="teksti"></textarea><br>
    <button type="submit">Lisää kirjoitus</button>
</form>