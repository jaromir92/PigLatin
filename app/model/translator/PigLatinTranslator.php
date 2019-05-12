<?php

namespace App\Model\Translator;

class PigLatinTranslator {

    private $rules = [];

    public function __construct() {
        $this->rules[EmptyWordRule::class] = true;
        $this->rules[VowelWordRule::class] = true;
        $this->rules[SilentConsonantWordRule::class] = true;
        $this->rules[ConsonantWordRule::class] = true;
        $this->rules[UnrecognizedWordRule::class] = true;
    }

    public function translate(string $translationText): string {
        $enabledRules = $this->getEnabledRules();
        foreach($enabledRules as $ruleClassName) {
            $rule = new $ruleClassName($translationText);
            if($rule->isMatched()) {
                return $rule->compileTranslation();
            }
        }
    }

    private function getEnabledRules(): array {
        $enabledRules = [];
        foreach($this->rules as $ruleClassName => $enabled) {
            if($enabled) {
                $enabledRules[] = $ruleClassName;
            }
        }
        return $enabledRules;
    }
}