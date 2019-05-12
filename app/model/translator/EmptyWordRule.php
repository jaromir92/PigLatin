<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class EmptyWordRule implements ITranslationRule {

    private $word;

    public function __construct(string $word) {
        $this->word = $word;
    }

    public function isMatched(): bool {
        return (Strings::length($this->word) === 0);
    }

    public function compileTranslation(): string {
        return $this->word;
    }
}