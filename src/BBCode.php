<?php

namespace JLarosee\BBCode;

use JLarosee\BBCode\Parser\BBCodeParser;
use JLarosee\BBCode\Parser\HTMLParser;

final class BBCode {
    
    private $htmlParser;
    private $bbCodeParser;

    const CASE_SENSITIVE = 0;

    public function __construct()
    {
        $this->htmlParser = new HTMLParser();
        $this->bbCodeParser = new BBCodeParser();
    }

    public function only($only = null)
    {
        $this->htmlParser->only($only);
        $this->bbCodeParser->only($only);

        return $this;
    }

    public function except($except = null)
    {
        $this->htmlParser->except($except);
        $this->bbCodeParser->except($except);

        return $this;
    }

    public function stripBBCodeTags(string $text)
    {
        return $this->bbCodeParser->stripTags($text);
    }

    public function convertFromHtml(string $text)
    {
        return $this->htmlParser->parse($text);
    }

    public function convertToHtml(string $text, $caseSensitive = null)
    {
        return $this->bbCodeParser->parse($text, $caseSensitive);
    }

    public function addParser(string $name, string $pattern, string $replace, string $content)
    {
        $this->bbCodeParser->addParser($name, $pattern, $replace, $content);

        return $this;
    }
}
