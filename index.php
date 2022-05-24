<?php
require 'function.php';
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action='liste';
}
if (isset($_REQUEST['reaction'])){
    if ($_REQUEST['reaction'] == 'new'){
        saveEntry(getentry_val());
    }
    if ($_REQUEST['reaction'] == 'delete'){
        delete_txt_by_id($_REQUEST['id']);
    }
    if ($_REQUEST['reaction'] == 'change'){
        change_txt_by_id($_REQUEST['id'],$_REQUEST['changetxt']);
    }
}


include 'view/' .$action .'.php';

//switch ($_REQUEST('reaction')){
//        case'new':
//            echo 'super'.$action;
//            break;
//////            saveEntry(getentry_val());
////            break;
////        case"change":
////            echo 'change';
////            change_txt_by_id($_REQUEST['id'],$_REQUEST['changetxt']);
////            break;
////        case"delete":
////            delete_txt_by_id($_REQUEST['id']);
////            break;
//        default:
//
//            break;
////
//    }