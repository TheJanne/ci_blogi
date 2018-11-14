<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Blogi</title>        
        <link <?php print "href=" . base_url() . "css/styling.css" ?> rel="stylesheet" href="css/styling.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>    
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Blogi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav mr-auto">
                  <?php 
                  print "<li>";
                  print anchor("/", "Etusivulle", "class='nav-link'");
                  //print $this->session->userdata("loggedin"); prints id
                  print "</li>";

                  if($this->session->userdata("loggedin"))
                  {                        
                      print "<li>";
                      print anchor("kirjoitus/lisaa_kirjoitus", "Lisää kirjoitus", "class='nav-link'");                                             
                      print '</li>';      
                      
                      print "<li>";
                      print "<p class='nav-link'>Kirjautut kayttaja: " . $this->session->userdata("loggedin")->tunnus . "</p>";
                      print '</li>';
                      
                      print "<li>";
                      print anchor("kayttaja/kirjaudu_ulos", "Kirjaudu ulos", "class='nav-link'");                                             
                      print '</li>'; 
                  }                    
                  else
                  {
                      print '<li class="nav-item">';
                      print anchor("kayttaja/kirjaudu_sisaan/", "Kirjaudu sisään", "class='nav-link'");  
                      print '</li>';
                      
                      print '<li class="nav-item">';
                      print anchor("kayttaja/rekistoroidy/", "Rekistöröidy", "class='nav-link'");  
                      print '</li>';
                  }
                  ?>
                </ul>
            </div>
            </nav><!-- Nav bar -->           
        </header>   
        <article>
        <?php          
                $this->load->view($content);                  
        ?> 
        </article>
    </body>
</html>
