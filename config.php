<?php

/**
 * DBLS - Deutsche Bahn Lokfuhrer Seite - application made for TS2017
 *
 * This file contains database logging credintials.
 *
 * PHP version 7.2
 *
 * @category  Transport
 * @package   DBLS
 * @author    Oskar Barcz <kontakt@archi-tektur.pl>
 * @copyright 2018 Oskar 'archi_tektur' Barcz
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   GIT:<git_id>
 * @link      https://dbls.eu
 */

return [

    'PREFIX' => '/framework',
    'appconfig' =>
    [
        'pageTitle' => "framework",
        'pageEncoding' => "UTF-8",
        'pageLanguage' => "pl",
        'pageDescription' => "",
        'pageKeywords' => "",
        'pageAuthor' => "Oskar 'archi_tektur' Barcz",
    ],

    'dbconfig' =>
    [
        "dsn" => 'mysql:host=localhost;dbname=',
        "usr" => 'root',
        "pswd" => '',
        "addInfo" => [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'],
    ],
];
