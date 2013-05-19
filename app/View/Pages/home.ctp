<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ramifood', 'root', 'azerty');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$pdo->beginTransaction();

$result = $pdo->query("SELECT admin_name1, admin_code1 FROM geo GROUP BY admin_name1");
$result->setFetchMode(PDO::FETCH_OBJ);

foreach($result->fetchAll() as $row) 
{
      //echo $row->admin_name1; 
    
    $exc = $pdo->prepare("INSERT INTO fo_regions(name, code) VALUES(:name,:code)" );
    $exc->bindParam(':name', $row->admin_name1);
    $exc->bindParam(':code', $row->admin_code1);
  
    
    
    if($exc->execute()){
        $region_id = $pdo->lastInsertId();

        
        $department = $pdo->query("SELECT admin_name2, admin_code2 FROM geo WHERE admin_code1 = '".$row->admin_code1."'");
        $department->setFetchMode(PDO::FETCH_OBJ);
        

        while ($r = $department->fetch())
        {
              $dpt = $pdo->prepare("INSERT INTO fo_departments(name, code, regions_id) VALUES(:name,:code,:regions_id)" );
              $dpt->bindParam(':name', $r->admin_name2);
              $dpt->bindParam(':code', $r->admin_code2);
              $dpt->bindParam(':regions_id', $region_id);  
              
                  if($dpt->execute())
                  {
                      $dept_id = $pdo->lastInsertId();
                      
                      $region = $pdo->query("SELECT place_name, postal_code, latitude, longitude FROM geo WHERE admin_code2 = '".$row->admin_code2."'");
                      $region->setFetchMode(PDO::FETCH_OBJ); 
                      
                      while ($d = $region->fetchAll())
                      {
                          $reg = $pdo->prepare("INSERT INTO fo_departments(name, potalcode, lat, lng, departments_id) VALUES(:name,:potalcode,:lat, :lng, :departments_id)" );
                          $reg->bindParam(':name', $d->place_name);
                          $reg->bindParam(':postalcode', $d->postal_code);
                          $reg->bindParam(':lat', $d->latitude);
                          $reg->bindParam(':lng', $d->longitude);
                          $reg->bindParam(':departments_id', $dept_id);
                      }
                  }
        }
        
        
    }
}

$pdo->commit();
?>