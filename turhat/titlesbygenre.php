<?php
    
    // Muodosta tietokantayhteys
    require_once('../db.php'); // Ottaa db.php tiedosto käyttöön 
    $genre = $_GET['genre'];
    $conn = createDbConnection(); // kutsutaan db.php tiedostossa olevaa 
    // createDbConnection()- funktiota joka avaa tietokantayhteyden
    // Muodosta sql lause muuttujaan. 
    $sql = "SELECT `primary_title`
    FROM `titles` INNER JOIN title_genres
    ON titles.title_id = title_genres.title_id
    WHERE genre LIKE '%" . $genre . "%'
    LIMIT 10;";
    

    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
      // Tulosta 
    $html = '<h1>' . $genre . '</h1>';
    $html .= '<ul>';  
    foreach($rows as $row) {
        $html .= '<li>' . $row['primary_title'] . '</li>';
    }
    echo $html;