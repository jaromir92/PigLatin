<?php

namespace App\Model\Usecases;

use App\Model\Translator\PigLatinTranslator;

class TranslateText {

    private $pigLatinTranslator;

    public function __construct(PigLatinTranslator $pigLatinTranslator) {
        $this->pigLatinTranslator = $pigLatinTranslator;
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
            $translatedLine[] = $this->pigLatinTranslator->translate($word);
        }
        return implode(" ", $translatedLine);
    }
}