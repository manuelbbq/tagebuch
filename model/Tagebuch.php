<?php
function db_conn($func)
{
    $conn = new mysqli('localhost', 'root', 'root', 'tagebuch');

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $func($conn);
    $conn->close();
}


//echo "Connected successfully";
function get_tagebuch($conn){
    $sql ="SELECT * FROM eintraege  order by Eintragid ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
//            echo "id: " . $row["Eintragid"]. "<br>";
//            echo "date" . $row["Createdate"]. "<br>";
//            echo "change" . $row["Changedate"]. "<br>";
//            echo "eintrag" . $row["Eintrag"]. "<br>";
            Tagebuch::new_tagebuch($row['Eintragid'],$row['Createdate'], $row['Changedate'], $row['Eintrag']);
        }
    } else {
        echo "0 results";
    }










}



class Tagebuch
{
    public static array $eintraege = [];

    public static function new_tagebuch ($eintragid, $createdate, $changedate, $eintrag){
        self::$eintraege[]=[$eintragid, $createdate, $changedate, $eintrag];
    }

    public static function remove_entry($id){


    }
    public static function change_entry($id){

    }
}

db_conn('get_tagebuch');
