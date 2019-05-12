<?php

namespace App\Model\Translator;

class VowelWordRule extends OnlySuffixWordRule implements ITranslationRule {

    const VOWELS = ["a", "e", "i", "o", "u"];

    public function __construct(string $word) {
        parent::__construct($word, self::VOWELS);
    }

    public function isMatched(): bool {
        return parent::isMatched();
    }

    public function compileTranslation(): string {
        return parent::compileTranslation();
    }
}