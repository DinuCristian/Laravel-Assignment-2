<?php

use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Translator
{
    private static $translator = array();

    public static function translate($text, $requestedLanguage = '')
    {
        if ('' == $text) {
            return $text;
        }

        if ('' == $requestedLanguage) {
            $language = App::getLocale();
            if (array_key_exists($language, Translator::$translator) == false && 'en' != $language) {
                Translator::$translator[$language] = new GoogleTranslate();
                Translator::$translator[$language]->setTarget($language);
            }

            if ('en' != $language) {
                return Translator::$translator[$language]->translate($text);
            }

            return $text;
        } else {
            if (array_key_exists($requestedLanguage, Translator::$translator) == false) {
                Translator::$translator[$requestedLanguage] = new GoogleTranslate();
                Translator::$translator[$requestedLanguage]->setTarget($requestedLanguage);
            }

            return Translator::$translator[$requestedLanguage]->translate($text);
        }
    }
}