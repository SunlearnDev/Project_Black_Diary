<?php

namespace App\Support;

class HTMLPurifier
{
    private static $purifier;

    /**
     * @param $value
     * @return mixed
     */
    public static function clean($value)
    {
        return self::getPurifier()->purify($value);
    }

    /**
     * @return \HTMLPurifier
     */
    private static function getPurifier()
    {
        if (is_null(self::$purifier)) {
            //Find full HTML5 config : https://github.com/kennberg/php-htmlpurfier-html5
            $config = \HTMLPurifier_Config::createDefault();
            $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
            $config->set('HTML.SafeIframe', true);
            $config->set('Cache.SerializerPath', storage_path() . '/app/purifier');
            $config->set('Cache.SerializerPermissions', 777);
            $def = $config->getHTMLDefinition(true);
            $def->addElement('figure', 'Block', 'Flow', 'Common', ['class']);
            $def->addElement('oembed', 'Block', 'Flow', 'Common', ['url']);
            $def->addAttribute('oembed', 'url', 'Text');

            self::$purifier = new \HTMLPurifier($config);
        }

        return self::$purifier;
    }
}
