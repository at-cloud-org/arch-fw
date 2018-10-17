<?php
/**
 * ArchFramework (ArchFW in short) is universal template for server-side rendered applications and services.
 * ArchFW comes with pre-installed router and JSON API functionality.
 * Visit https://github.com/archi-tektur/ArchFW/ for more info.
 *
 * PHP version 7.2
 *
 * @category  Framework / Template
 * @package   ArchFW
 * @author    Oskar Barcz <kontakt@archi-tektur.pl>
 * @copyright 2018 Oskar 'archi_tektur' Barcz
 * @license   MIT
 * @version   2.5.0
 * @link      https://github.com/archi-tektur/ArchFW/
 */

use ArchFW\Application as Service;
use ArchFW\Exceptions\ArchFWException;

/*
HERE IS A PART OF THE FILE YOU CAN AND SHOULD EDIT IF YOU CHANGED THE FRAMEWORK STRUCTURE

Enter fistly relative path to the folder containing configs.
 */
$configPath = '../config';
/*
Now enter relative path to the Composer sources autoloader (usually vendor/autoload.php)
 */
$vendor = '../vendor/autoload.php';
/*
Better do not edit the code below.
 */

try {
    // ENSURE CONFIG FILES PATH IS VALID
    if (!file_exists($configPath)) {
        throw new ArchFWException('Config file wasn\'t found!', 2);
    }

    /*
    As far as you are using PHP older than 7.0.0 this framework won't start, because
    it uses functionality that were not implemented before.
     */
    if (version_compare(PHP_VERSION, '7.0.0') < 0) {
        throw new ArchFWException('Unsupported PHP version, minimum: 7.0.0, yours: ' . PHP_VERSION, 4);
    }

    // ENSURE HAVING VENDOR FILES
    if (!file_exists($vendor)) {
        throw new
        ArchFWException('VENDOR files were not found, run \'composer install\' over main framework folder.', 3);
    }
    // LOADING LIBS AND CLASSES
    include_once $vendor;

    try {
        // Run a service
        new Service($configPath);
    } catch (ArchFWException $mainClassError) {
        // Catch the exceptions that came while running the app.
        header('Content-Type text/plain');
        http_response_code(404);
        exit('FATAL ERROR ' . $mainClassError->getCode() . ': ' . $mainClassError->getMessage());
    }

} catch (ArchFWException $err) {
    // Catch the exceptions that came before running an app.
    http_response_code(500);
    exit('INIT ERROR ' . $err->getCode() . ': ' . $err->getMessage());
}