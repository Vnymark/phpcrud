<?php
/*
 * Function for autoloading manually created classes.
 * Will check if a file for the required class exists and require it.
 */
function classAutoload($class_name)
{
    if (file_exists(  __DIR__ . '/includes/classes/' . $class_name . '.php')) {
        require_once __DIR__ . '/includes/classes/' . $class_name . '.php';
    }
}

/*
 * Make sure that the function for autoloading classes is included in the autoloader.
 */
spl_autoload_register('classAutoload');

/*
 * Validates an e-mail address according to the built in php filter.
 */
function isValidEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}
/*
 * Validates name with letters between a to ö.
 * Allows double names separated with hyphen.
 */
function isValidName($name){
    if (!preg_match("/^[a-öA-Ö]*([-]?[a-öA-Ö])*$/", $name)) {
        return false;
    } else {
        return true;
    }
}

/*
* Validates regular Swedish social security numbers to a certain level.
* No special cases like temporary SSN's are allowed, or SSN's for businesses.
* The regex will allow some faulty dates, but these should be handled by the checkdate().
*/
function isValidSSN($ssn){
    if (!preg_match("/\b(((20)((0[0-9])|(1[0-8])))|(([1][^0-8])\d{2}))((0[1-9])|1[0-2])((0[1-9])|(1[0-9])|(2[0-9])|(3[0-1]))[-]?\d{4}?\b/", $ssn)) {
        return false;
    } else {
        $year = substr($ssn, 0, 4);
        $month = substr($ssn, 4, 2);
        $date = substr($ssn, 6, 2);

        if (!checkdate($month, $date, $year)) {
            return false;
        } else {
            return true;
        }
    }
}

/*
 * Validates phone numbers according to Swedish phone numbers.
 * A valid phone number should start with a 0( or +44 to +48).
 * If the "second" digit is a 7, it will expect eight following digits. - For a total of 10 digits.
 * If the "second" digit is anything else than a 7, it will allow six to eight following digits. - For a total of 8 to 10 digits.
 */
function isValidPhone($phone){
    if (!preg_match("/^((0|([\+][4][4-8]))((7\d{8}?)|([^7]\d{6,8})))$/", $phone)) {
        return false;
    } else {
        return true;
    }
}