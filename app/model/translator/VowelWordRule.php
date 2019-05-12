<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class VowelWordRule implements ITranslationRule {

    const SUFFIX = "yay";
    const VOWELS = ["a", "e", "i", "o", "u"];

    private $word;

    public function __construct(string $word) {
        $this->word = $word;
    }

    public function isMatched(): bool {
        foreach(self::VOWELS as $vowel) {
            if(Strings::startsWith(Strings::lower($this->word), $vowel)) {
                return true;
            }
        }
        return false;
    }

    public function compileTranslation(): string {
        return $this->word . "-" . self::SUFFIX;
    }
}