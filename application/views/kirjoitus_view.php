<?php
    /*
    $data["kirjoitus"] = array(
        "id"            => $kirjoitusDataa[0]->kirjoitus_id,
        "otsikko"       => $kirjoitusDataa[0]->otsikko,
        "teksti"        => $kirjoitusDataa[0]->teksti,
        "kirjoittaja"   => $kirjoitusDataa[0]->kayttaja_id,
        "paivays"       => $kirjoitusDataa[0]->paivays,
        "kirjoittaja"   => $kirjoitusDataa[0]->tunnus
    );
    */
?>
<div class="kirjoitus">
    <h1><?php print $kirjoitus["otsikko"] ?></h1>
    <p> <?php print $kirjoitus["teksti"] ?> </p>
    <p> Kirjoittaja: <?php print $kirjoitus["kirjoittaja"]?></p>
    
</div>
<?php
foreach($kommentit as $kommentti)
{
    print "<div class='kommentti'>";
    print "<h4>$kommentti->tunnus</h4>";
    print "<p>$kommentti->teksti</p>";
    print "<p>$kommentti->paivays</p>";
    if($this->session->userdata("loggedin")->id == $kommentti->kayttaja_id || $this->session->userdata("loggedin")->id == $kirjoitus["kirjoittaja_id"])
    {
        print anchor("kirjoitus/poista_kommentti/".$kommentti->kommentti_id."/".$kirjoitus["id"], "Poista kommentti");
 
    }
   print "</div>";
    
}
?>
<div class="kommentointi">
    <form action="<?php print site_url();?>/kirjoitus/lisaa_kommentti/" method="post">
    <input type="number" name="kirjoitusID" hidden="true" value="<?php print $kirjoitus["id"] ?>" />
    <textarea class="kommenttiKentta" name="kommenttiTeksti"></textarea><br>
    <button type="submit">Lähetä</button>
    </form>    
</div>