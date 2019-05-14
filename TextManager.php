<?php

namespace App;

class TextManager
{

    public function clearString($string)
    {
        $string = htmlspecialchars($string);
        return $string;
    }

    public function downloadTranslations()
    {
        $array = array('ru', 'en');
        foreach ($array as $item) {
            $adresPerevodov = 'http://127.0.0.1/messages.' . $item . '.yml';
            $result = file_get_contents($adresPerevodov);

            $fp = fopen('translations/messages' . $item . 'yml');
            fwrite($fp, $result);
        }
    }

    public function getTranslationFile($string)
    {
        $filename = "translations/messages." . $string . '.yml';
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        return $contents;
    }

    public function capitalizeFirstLetter(string $text): string
    {
        $result = ucfirst($text);
        return $result;
    }

}