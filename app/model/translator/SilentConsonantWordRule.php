<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class SilentConsonantWordRule implements ITranslationRule {

    const SUFFIX = "yay";
    const SILENT_CONSONANTS = ["bt", "ck", "cq", "dn", "dg", "gn", "kn", "la", "lo", "lu", "ps", "pt", "pn", "sl", "wr"];
    const DELIMITER = "-";

    private $word;

    public function __construct(string $word) {
        $this->word = $word;
    }

    public function isMatched(): bool {
        foreach(self::SILENT_CONSONANTS as $silentConsonant) {
            if(Strings::startsWith(Strings::lower($this->word), $silentConsonant)) {
                return true;
            }
        }
        return false;
    }

    public function compileTranslation(): string {
        return $this->word . self::DELIMITER . self::SUFFIX;
    }
}