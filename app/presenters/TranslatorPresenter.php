<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\Forms\ITranslatorFormFactory;
use App\Components\Forms\TranslatorForm;
use Nette;

final class TranslatorPresenter extends Nette\Application\UI\Presenter {

    private $translatorFormFactory;

    public function injectTranslatorFormFactory(ITranslatorFormFactory $translatorFormFactory): void {
        $this->translatorFormFactory = $translatorFormFactory;
    }

    public function createComponentTranslatorForm(): TranslatorForm {
        return $this->translatorFormFactory->create();
    }
}