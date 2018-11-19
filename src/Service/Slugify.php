<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 19/11/18
 * Time: 15:42
 */

namespace App\Service;


class Slugify
{
    public function generate(string $input) : string
    {
        $input = trim($input);

        $input = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $input);
        $input = str_replace(' ', '-', $input);
        $symboles=['!','"', '.', ',', ':', '\'', '\"', '?', '%','(', ')', '{', '}', '[', ']', '#', '&', '@', '/', ';'];
        $input = str_replace($symboles, '', $input);

        $long = strlen($input);
        $tableau = str_split($input);

        for ($i=0 ; $i<$long; $i++)
        {
            if ($tableau[$i] == '-' && $tableau[$i+1] == '-')
            {
                unset($tableau[$i]);
            }
        }
        $input = implode($tableau);

        return $input;


    }
}