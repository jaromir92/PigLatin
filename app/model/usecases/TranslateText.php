<?php

namespace App\Model\Usecases;

class TranslateText {

    public function __construct() {

    }

    public function doIt(string $translationText): string {
        $lines = preg_split('/\r\n|[\r\n]/', $translationText);
        $translatedLines = [];
        foreach($lines as $line) {

            $translatedLines[] = $this->translateLine($line);
        }
        $translatedText = implode("\r\n", $translatedLines);
        return $translatedText;
    }

    private function translateLine(string $line): string {
        $words = explode(" ", $line);
        $translatedLine = [];
        foreach($words as $word) {
            $translatedLine[] = $word; // translate
        }
        return implode(" ", $translatedLine);
    }
}