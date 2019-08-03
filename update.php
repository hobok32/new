<?php
//   
//    
    $a=mysqli_connect("den1.mysql2.gear.host","fruits1","Eo36S~Q4w3?8");
    mysqli_select_db($a,"fruits1");
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data["Id"];
    $name = $data["Name"];
    $price = $data["Price"];
    $season = $data["Season"];
    $storeAmount = $data["StoreAmount"];
    $sqlUpdate = "UPDATE Fruit SET Name = '$name', Price = '$price', Season = '$season', StoreAmount = '$storeAmount' WHERE Id = '$id'";
    $sql = "SELECT * FROM Fruit";
    $Fruit = array();
    $query = mysqli_query($a,$sql);
    
    //Tao 1 class de chua du lieu
    class Fruit{
        var $id;
        var $name;
        var $price;
        var $season;
        var $storeamount;
        function Fruit($_id,$_name,$_price,$_season,$_storeamount){
            $this -> id = $_id;
            $this -> name = $_name;
            $this -> price = $_price;
            $this -> season = $_season;
            $this -> storeamount = $_storeamount;
        }
    }
    
    
    if ($a->query($sqlUpdate) === TRUE) 
        {
            while($row = mysqli_fetch_array($query))
                    {
                        array_push($Fruit, new Fruit($row["Id"], $row["Name"], $row["Price"], $row["Season"], $row["StoreAmount"]));
                    }
        } 
        
    echo json_encode($Fruit);
?>
