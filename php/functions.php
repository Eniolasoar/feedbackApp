<?php
function emptyField($field): bool
{
    if(empty($field)){
        return true;
    }
    else{
        return false;
    }
}

function validEmail($email): bool
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}