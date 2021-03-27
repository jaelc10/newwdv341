<?php
function v_array($needle, $haystack) {
    if(is_array($haystack) && array_key_exists($needle, $haystack)) {
        return $haystack[$needle];
    }

    return 0;
}

function valid_event_presenter($event_presenter) {
    if($event_presenter == ''){
        return false;
    }
    return true; 
}


function valid_event_name($event_name) {
    if($event_name == ''){
        return false;
    }
    return true;    
}



function valid_event_date($event_date) {
    if($event_date == ''){
        return false;
    }
    return true; 
}

function valid_event_time($event_time) {
    if($event_time == ''){
        return false;
    }
    return true; 
}
function valid_event_description($event_description) {
    if($event_description == ''){
        return false;
    }
    return true; 
}


?>
