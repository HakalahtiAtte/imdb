<?php
    require_once('../db.php'); 
  
    $birth_year = $_GET['birth_year'];
    $conn = createDbConnection(); 
   

    /*
    CREATE PROCEDURE GetNamesByBirthYear(
	IN BirthYears INT
    )
    BEGIN
    
    SELECT name_ FROM names_ WHERE (birth_year = BirthYears) GROUP BY name_;

    END;
     */
    
     $sql = "CALL GetNamesByBirthYear('" . $birth_year . "');";
    
    


    
    $prepare = $conn->prepare($sql);
    $prepare->execute();
   
    $rows = $prepare->fetchAll();
   
    $html = '<h1>Names by birth year ' . $birth_year . '</h1>';
    $html .= '<ul>';
    
    foreach($rows as $row) {
        $html .= '<li>' . $row['name_'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;