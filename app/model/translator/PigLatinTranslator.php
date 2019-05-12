<?php

namespace App\Model\Translator;

class PigLatinTranslator {

    private $rules = [];

    public function __construct() {
        $this->rules[] = new EmptyWordRule();
        $this->rules[] = new VowelWordRule();
        // TODO: SilentConsonantWordRule
        $this->rules[] = new ConsonantWordRule();
        $this->rules[] = new UnrecognizedWordRule();
    }

    public function translate(string $translationText): string {
        foreach($this->rules as $rule) {
            $rule->setWord($translationText);
            if($rule->isMatched()) {
                return $rule->compileTranslation();
            }
        }
    }
}