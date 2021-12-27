<?php
  /*  // Funktio joka luo genre-pudotusvalikon
    function createGenreDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = 'SELECT DISTINCT genre FROM title_genres;';
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="genre">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['genre'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    } /*

    // Funktio joka luo region-pudotusvalikon
 /*   function createRegionDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = "SELECT DISTINCT region FROM aliases;";
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="region">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['region'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    } */

    function createBirthDropdown() {
        
        require_once('db.php'); 
        $conn = createDbConnection(); 
       
        $sql = "SELECT DISTINCT birth_year FROM `names_`
        ORDER BY birth_year ASC;";
       
        $prepare = $conn->prepare($sql);
        $prepare->execute();
      
        $rows = $prepare->fetchAll();
        
        $html = '<select name="birth_year">';
      
        foreach($rows as $row) {
          
            $html .= '<option>' . $row['birth_year'] . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    }

  /*  function createLivedFor() {
    
        require_once('db.php'); 
        $conn = createDbConnection(); 
       
        $sql = "SELECT DISTINCT death_year - birth_year as lived FROM `names_`
        ORDER BY lived DESC;";
       
        $prepare = $conn->prepare($sql);
        $prepare->execute();
      
        $rows = $prepare->fetchAll();
        $html = 'lived for';
        $html = '<select name="lived">';
      
        foreach($rows as $row) {
          
            $html .= '<option>' . $row['lived'] . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    } */