<?php


class XMLUtils
{
    private const OPEN_TAG = "<";
    private const CLOSE_TAG = ">";
    private const CLOSE_SLASH = "/";

    private static function getOpenTag(string $name): string
    {
        return self::OPEN_TAG . $name . self::CLOSE_TAG;
    }

    private static function getCloseTag(string $name)
    {
        return self::OPEN_TAG . self::CLOSE_SLASH . $name . self::CLOSE_TAG;
    }

    public static function appendOpenTag(string &$xml, string $tagName): void
    {
        $xml .= static::getOpenTag($tagName);
    }

    public static function appendCloseTag(string &$xml, string $tagName): void
    {
        $xml .= static::getCloseTag($tagName);
    }

    public static function appendTag(string &$xml, string $tagName, ?string $content): void
    {
        if(isset($content))
            $xml .= self::getOpenTag($tagName).$content.self::getCloseTag($tagName);
    }
}