<?php

function isValidEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}

function isValidName($name){
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        return false;
    } else {
        return true;
    }

}

function isValidSSN($ssn){
    if (!preg_match("/^[a-zA-Z ]*$/", $ssn)) {
        return false;
    } else {
        return true;
    }

}