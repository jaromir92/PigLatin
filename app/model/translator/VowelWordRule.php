<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class VowelWordRule implements ITranslationRule {

    const PRE_SUFFIX = "y";
    const SUFFIX = "ay";
    const VOWELS = ["a", "e", "i", "o", "u"];

    private $word;

    public function setWord(string $word): void {
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
        return $this->word . "-" . self::PRE_SUFFIX . self::SUFFIX;
    }
}