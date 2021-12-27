<?php
    require_once('../db.php'); 
  
    $birth_year = $_GET['birth_year'];
    $conn = createDbConnection(); 
   
    /*
    SELECT DISTINCT name_, birth_year, death_year, death_year - birth_year as `Lived for`, original_title as `known from` 
    from names_, known_for, titles
    WHERE known_for.name_id=names_.name_id AND known_for.title_id=titles.title_id
    GROUP BY name_
    ORDER BY `Lived for` DESC
    LIMIT 100;
    */
    /*
    CREATE PROCEDURE GetNamesByBirthYear(
	IN BirthYears INT
    )
    BEGIN
    
    SELECT name_ FROM names_ WHERE (birth_year = BirthYears) GROUP BY name_;

    END;
     */
    $sql = "CALL GetNamesByBirthYear('" . $birth_year . "');";
    
    // Tarkistukset yms

    // Aja kysely kantaan
    
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    // Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    // Tulosta otsikko
    $html = '<h1>Names by birth year ' . $birth_year . '</h1>';
    // Avaa ul-elementti
    $html .= '<ul>';
    // Looppaa tietokannasta saadut rivit läpi
    foreach($rows as $row) {
        // Tulosta jokaiselle riville li-elementti
        $html .= '<li>' . $row['name_'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;