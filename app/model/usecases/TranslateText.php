<?php

namespace App\Model\Usecases;

use App\Helpers\TextareaParser;
use App\Model\Translator\PigLatinTranslator;

class TranslateText {

    private $textareaParser;
    private $pigLatinTranslator;

    public function __construct(TextareaParser $textareaParser, PigLatinTranslator $pigLatinTranslator) {
        $this->textareaParser = $textareaParser;
        $this->pigLatinTranslator = $pigLatinTranslator;
    }

    public function doIt(string $translationText): string {
        $lines = $this->textareaParser->toMultiArray($translationText);
        foreach($lines as $lineNumber => $line) {
            foreach($line as $i => $word) {
                $lines[$lineNumber][$i] = $this->pigLatinTranslator->translate($word);
            }
        }
        $translatedText = $this->textareaParser->toText($lines);
        return $translatedText;
    }
}