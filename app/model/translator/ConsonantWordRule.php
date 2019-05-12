<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class ConsonantWordRule implements ITranslationRule {

    const SUFFIX = "ay";
    const CONSONANTS = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "y", "z"];
    const DELIMITER = "-";

    private $word;
    private $cluster;

    public function __construct(string $word) {
        $this->word = $word;
        $this->findConsonantCluster();
    }

    public function isMatched(): bool {
        return (Strings::length($this->cluster) > 0);
    }

    public function compileTranslation(): string {
        $word = Strings::substring($this->word, Strings::length($this->cluster));
        return $word . self::DELIMITER . $this->cluster . self::SUFFIX;
    }

    private function findConsonantCluster(): void {
        $this->cluster = "";
        $i = 0;
        $wordChars = str_split($this->word);
        while(key_exists($i, $wordChars) && in_array(Strings::lower($wordChars[$i]), self::CONSONANTS)) {
            $this->cluster .= $wordChars[$i];
            $i++;
        }
    }
}