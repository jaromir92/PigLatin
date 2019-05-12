<?php

namespace App\Model\Translator;

use Nette\Utils\Strings;

class PigLatinTranslator {

    const CONSONANTS = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "y", "z"];


    public function __construct() {
        // udělat tridu na empty string, zacinajici na cislo, zacinajici na souhlasku cluster, zacinajici na samohlasku, zac na tichou souhlasku, no match word (passed true, return word)
        // pote zaregistrovat do pole rozhrani ineco
        // prochazet pole a zkouset -> kdyz obraz sedi nastavit nejakou proměnnou a po provedeni se zeptat zda ok kdyz jo tak skončit když ne pokracovat
        // pruchodem pole

        // rozhrani -> buildTranslation(word) - isPassed

        /*
         * foreach(types as type) {
         *      if(type->isPassed()) // kontrola jestli je to tento typ
         *          return type->buildTranslation();
         * }
         *
         */
    }

    public function translate(string $translationText): string {

        // prázdný string
        if(Strings::length($translationText) === 0) {
            return $translationText;
        }

        // první případ -> slovo začíná na souhlásku nebo shluk souhlásek
        $cluster = $this->findConsonantCluster($translationText);

        if(Strings::length($cluster) === 0) {
            $wovel = "y";
        } else {
            $wovel = "";
        }

        $text = Strings::substring($translationText, Strings::length($cluster));
        return $text . "-" . $cluster . $wovel . "ay";
    }

    private function findConsonantCluster(string $text): string {
        $cluster = "";
        $i = 0;
        $array = str_split($text);
        while(key_exists($i, $array) && in_array($array[$i], self::CONSONANTS)) {
            $cluster .= $array[$i];
            $i++;
        }
        return $cluster;
    }
}