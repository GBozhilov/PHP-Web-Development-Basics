<?php
$country = readline();
$language = 'unknown';

switch ($country) {
    case 'England':
    case 'USA':
        $language = 'English';
        break;
    case 'Spain':
    case 'Argentina':
    case 'Mexico':
        $language = 'Spanish';
}

echo $language;