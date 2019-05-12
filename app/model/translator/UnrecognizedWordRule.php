<?php

namespace App\Model\Translator;

class UnrecognizedWordRule implements ITranslationRule {

    private $word;

    public function setWord(string $word): void {
        $this->word = $word;
    }

    public function isMatched(): bool {
        return true;
    }

    public function compileTranslation(): string {
        return $this->word;
    }
}