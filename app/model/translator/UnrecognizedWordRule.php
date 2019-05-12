<?php

namespace App\Model\Translator;

class UnrecognizedWordRule implements ITranslationRule {

    private $word;

    public function __construct(string $word) {
        $this->word = $word;
    }

    public function isMatched(): bool {
        return true;
    }

    public function compileTranslation(): string {
        return $this->word;
    }
}