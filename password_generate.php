<?php

$password_length = 9;
$number_of_passwords = 20;

function get_special()
{
    $specials = [33, 35, 36, 37, 38, 47, 61, 63, 64];
    return chr($specials[random_int(0, count($specials) - 1)]);
}

function get_letter($upper_or_lower)
{
    $letters = array();
    for ($x = 97; $x <= 122; $x++) {
        $letters[] = chr($x);
    }

    $letter = $letters[random_int(0, count($letters) - 1)];
    if ($upper_or_lower) {
        return strtoupper($letter);
    } else {
        return strtolower($letter);
    }
}

function create_pass($password_length)
{
    $pass = array();

    //At least one special and one uppercase letter.
    $pass[] = get_special();
    $pass[] = get_letter(1);
    for ($i = 0; $i <= $password_length - 2; $i++) {
        $pass[] =  choose_number_or_letter();
    }
    // var_dump($pass);
    shuffle($pass);
    echo implode('', $pass);
}

function choose_number_or_letter()
{
    $a = [1, 1, 1, 1, 1, 2, 3, 3, 3, 3]; //letter, special, number
    $choice = $a[random_int(0, count($a) - 1)];
    if ($choice == 1) {
        return get_letter(random_int(0, 1));
    } elseif ($choice == 2) {
        return get_special();
    } else {
        return random_int(0, 9);
    }
}

for ($i = 0; $i <= $number_of_passwords; $i++) {
    echo create_pass($password_length) . "<br>";
}
