<?php
    
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ottaa db.php tiedosto käyttöön 
    
    $conn = createDbConnection(); // kutsutaan db.php tiedostossa olevaa 
    // createDbConnection()- funktiota joka avaa tietokantayhteyden
    // Muodosta sql lause muuttujaan. 
    $sql = "SELECT name_
    FROM names_ 
    WHERE name_ LIKE '%cat%';";
    

    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
      // Tulosta 
   
    $html .= '<ul>';  
    foreach($rows as $row) {
        $html .= '<li>' . $row['name_'] . '</li>';
     
    }
    echo $html;