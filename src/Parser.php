<?php

namespace Scraperize\UniversalScraper;

/**
 * Class Parser
 *
 * @package Scraperize\UniversalScraper
 */
class Parser
{
    /**
     * find
     *
     * @param string $type
     * @param string $name
     * @param string $content
     *
     * @return null|string
     */
    public static function find($type, $name, $content)
    {
        switch ($type) {
            case 'input':
                if (preg_match('#<input[^>]+name=[\'"]' . $name . '[\'"][^>]+value=[\'"]([^\s\'">]+)[\'"][^>]*>#si', $content, $match)) {
                    return trim($match[1]);
                }
                break;

            case 'textarea':
                if (preg_match('#<textarea[^>]+id=[\'"]' . $name . '[\'"][^>]*>([^>]+)</textarea>#si', $content, $match)) {
                    return trim($match[1]);
                }
                break;
        }

        return null;
    }
}
