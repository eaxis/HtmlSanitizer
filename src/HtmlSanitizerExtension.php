<?php

namespace Bolt\Extension\eaxis\HtmlSanitizer;

use Bolt\Extension\SimpleExtension;

class HtmlSanitizerExtension extends SimpleExtension
{
    protected function registerTwigFilters()
    {
        return [
            'sanitize' => ['sanitize']
        ];
    }

    public function sanitize($string)
    {
        $allowedMarkup = '<br><p><h1><h2><h3><h4><a><strong><ul><i><b><u><li><div><button>';
        $string = \strip_tags($string, $allowedMarkup);

        $string = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $string);

        return $string;
    }
}