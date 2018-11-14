<?php
    foreach($kirjoitukset as $kirjoitus)
    {
        print "<div class='kirjoitus'>";
        print anchor("kirjoitus/index/$kirjoitus->kirjoitus_id", $kirjoitus->otsikko);
        print "<br>";
        print $kirjoitus->teksti;
        print "<br> Kirjoittanut ";
        print $kirjoitus->tunnus;
        print "<br>";
        print $kirjoitus->paivays;
        print "<br>";
        
        //Vain kirjautunut käyttäjä voi poistaa kirjoituksen
        if($this->session->userdata("loggedin"))
        {
            //Vain omat kirjoitukset voidaan poistaa.
            if($kirjoitus->kayttaja_id == $this->session->userdata("loggedin")->id)
            {
                print anchor("kirjoitus/poista_kirjoitus/$kirjoitus->kirjoitus_id", "Poista kirjoitus");
            }
        }
        
        print "</div>";
    }