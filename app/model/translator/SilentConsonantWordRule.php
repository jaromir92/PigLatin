<?php

namespace App\Model\Translator;

class SilentConsonantWordRule extends OnlySuffixWordRule implements ITranslationRule {

    const SILENT_CONSONANTS = ["bt", "ck", "cq", "dn", "dg", "gn", "kn", "la", "lo", "lu", "ps", "pt", "pn", "sl", "wr"];

    public function __construct(string $word) {
        parent::__construct($word, self::SILENT_CONSONANTS);
    }

    public function isMatched(): bool {
        return parent::isMatched();
    }

    public function compileTranslation(): string {
        return parent::compileTranslation();
    }
}