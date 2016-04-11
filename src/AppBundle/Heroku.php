<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 11.04.2016
 * Time: 10:10
 */

namespace AppBundle;


class Heroku
{
    public static function deleteParametersYml()
    {
        $parametersFile = '../app/config/parameters.yml';

        if(unlink($parametersFile)) {
            echo '"' . $parametersFile .  '" successfully delete!';
        } else {
            echo 'Error while deleting "' . $parametersFile .  '"!';
        }
    }
}