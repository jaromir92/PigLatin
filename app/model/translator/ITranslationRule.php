<?php

namespace App\Model\Translator;


interface ITranslationRule {

    public function setWord(string $word): void;
    public function isMatched(): bool;
    public function compileTranslation(): string;
}