<?php
function get_files()
{
    $d = dir("eintraege");
    $files = [];
    while (false !== ($entry = $d->read())) {
        if (is_file("eintraege/" . $entry)) {
            $files[] = substr($entry,7,-4);
        }
    }
    $d->close();
    rsort($files);
    return $files;
}


function get_file_array($arr,$start,  $count){
    $eintraege = [];
    foreach ($arr as $key => $index){
        if ($key < $start *$count){
            continue;
        }
        if ($key == $start *$count+ $count){
            break;
        }
        $eintraege[] = file('eintraege/eintrag'.$index.'.txt');
    }
    return $eintraege;
}

function getentry_val(){
//    date_default_timezone_set('Europe/Berlin');

    $id = get_files()[0] +1;
    $timeStamp = date("Y.m.d H:i");
    $changeStamp = date("Y.m.d H:i");
    $entryText = $_REQUEST['entryText'];


    return [$id,$timeStamp, $changeStamp,$entryText];
}

function saveEntry($arr){
    foreach ($arr as $row){
        file_put_contents('eintraege/eintrag'.$arr[0] .'.txt',$row."\n", FILE_APPEND);
    }
}


function new_id($array){
    return $array[0]+1;
}



function get_data_by_id ($id){
    return file('eintraege/eintrag'. $id.'.txt');
}
function change_txt_by_id($id, $txt){
//    date_default_timezone_set('Europe/Berlin');

    $arr = get_data_by_id($id);
    $date = str_replace("\n","",$arr[1])  ;
    $change =date("Y.m.d H:i");
    $newarr = [$id, $date, $change, $txt];
    unlink('eintraege/eintrag'.$id.'.txt');
    saveEntry($newarr);

}
function delete_txt_by_id($id){
    unlink('eintraege/eintrag'.$id.'.txt');

}

//for($i = 1; $i <= 18; $i++) {
//    saveEntry([$i,date("Y.m.d H:i"),date("Y.m.d H:i"),'Eintrag'.$i]);
//
//}



?>

