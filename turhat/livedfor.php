<?php
    
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ottaa db.php tiedosto käyttöön 
    $lived = $_GET['birth_year'];
    $conn = createDbConnection(); // kutsutaan db.php tiedostossa olevaa 
    // createDbConnection()- funktiota joka avaa tietokantayhteyden
    // Muodosta sql lause muuttujaan. 
    $sql = "SELECT DISTINCT death_year - birth_year as lived, name_
    FROM names_;";
            
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
      // Tulosta 
    $html = '<h1>' . $lived . '</h1>';
    $html .= '<ul>';  
    foreach($rows as $row) {
        $html .= '<li>' . $row['death_year'] . '</li>';
    }
    echo $html;