<?php

namespace App\Helpers;

class TextareaParser {

    private $lineDelimiterPattern;
    private $lineDelimiter;
    private $wordDelimiter;

    public function __construct() {
        $this->lineDelimiterPattern = '/\r\n|[\r\n]/';
        $this->lineDelimiter = "\r\n";
        $this->wordDelimiter = " ";
    }

    public function toMultiArray(string $text): array {
        $multiArray = [];
        $lines = preg_split($this->lineDelimiterPattern, $text);
        foreach($lines as $lineNumber => $line) {
            $words = explode($this->wordDelimiter, $line);
            foreach($words as $word) {
                $multiArray[$lineNumber][] = $word;
            }
        }
        return $multiArray;
    }

    public function toText(array $lines): string {
        foreach($lines as $lineNumber => $line) {
            $lines[$lineNumber] = implode($this->wordDelimiter, $line);
        }
        $text = implode($this->lineDelimiter, $lines);
        return $text;
    }
}