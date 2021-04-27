<?php

function valid_title($title) {
    if($title == ''){
        return false;
    }
    return true;    
}

function valid_description($description) {
    if($description == ''){
        return false;
    }
    return true; 
}

function valid_author($author) {
    if($author == ''){
        return false;
    }
    return true; 
}

function valid_date($date) {
    if($date == ''){
        return false;
    }
    return true; 
}

function valid_time($time) {
    if($time == ''){
        return false;
    }
    return true; 
}

?>