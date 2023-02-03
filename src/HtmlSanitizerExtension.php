<?php

namespace Bolt\Extension\eaxis\HtmlSanitizer;

use Bolt\Extension\SimpleExtension;

class HtmlSanitizerExtension extends SimpleExtension
{
    protected function registerTwigFilters()
    {
        $options = ['is_safe' => [ 'html' ], 'safe' => true];

        return [
            'sanitize' => ['sanitize', $options]
        ];
    }

    public function sanitize($string)
    {
        $allowedMarkup = '<br><p><h1><h2><h3><h4><a><strong><ul><i><b><u><li><div><img>';
        $string = \strip_tags($string, $allowedMarkup);

        $string = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $string);

        return $string;
    }
}
