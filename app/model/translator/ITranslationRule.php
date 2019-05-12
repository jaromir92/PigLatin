<?php

namespace App\Model\Translator;


interface ITranslationRule {

    public function __construct(string $word);
    public function isMatched(): bool;
    public function compileTranslation(): string;
}