<?php
    
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ottaa db.php tiedosto käyttöön 
    $name = $_GET['name_'];
    $conn = createDbConnection(); // kutsutaan db.php tiedostossa olevaa 
    // createDbConnection()- funktiota joka avaa tietokantayhteyden
    // Muodosta sql lause muuttujaan. 
    $sql = "SELECT name_
    FROM names_ 
    WHERE name_ LIKE '%dog%';";
    

    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
      // Tulosta 
    $html = '<h1>' . $name . '</h1>';
    $html .= '<ul>';  
    foreach($rows as $row) {
        $html .= '<li>' . $row['name_'] . '</li>';
    }
    echo $html;