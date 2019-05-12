<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class ConsonantWordRule implements ITranslationRule {

    const SUFFIX = "ay";
    const CONSONANTS = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "y", "z"];

    private $word;
    private $cluster;

    public function setWord(string $word): void {
        $this->word = $word;
    }

    public function isMatched(): bool {
        $this->findConsonantCluster();
        return (Strings::length($this->cluster) > 0);
    }

    public function compileTranslation(): string {
        $word = Strings::substring($this->word, Strings::length($this->cluster));
        return $word . "-" . $this->cluster . self::SUFFIX;
    }

    private function findConsonantCluster(): void {
        $this->cluster = "";
        $i = 0;
        $array = str_split($this->word);
        while(key_exists($i, $array) && in_array(Strings::lower($array[$i]), self::CONSONANTS)) {
            $this->cluster .= $array[$i];
            $i++;
        }
    }
}