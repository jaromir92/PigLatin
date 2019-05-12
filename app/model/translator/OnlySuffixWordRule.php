<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

abstract class OnlySuffixWordRule {

    const SUFFIX = "yay";
    const DELIMITER = "-";

    protected $word;
    protected $matchedChars;

    public function __construct(string $word, array $matchedChars) {
        $this->word = $word;
        $this->matchedChars = $matchedChars;
    }

    protected function isMatched(): bool {
        foreach($this->matchedChars as $char) {
            if(Strings::startsWith(Strings::lower($this->word), $char)) {
                return true;
            }
        }
        return false;
    }

    protected function compileTranslation(): string {
        return $this->word . self::DELIMITER . self::SUFFIX;
    }
}