<?php

namespace App\Components\Forms;

interface ITranslatorFormFactory {

    /**
     * @return TranslatorForm
     */
    public function create(): TranslatorForm;
}