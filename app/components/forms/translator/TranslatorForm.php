<?php

namespace App\Components\Forms;

use App\Model\Usecases\TranslateText;
use Nette\Application\UI\Control;
use Nette\Http\Request;

class TranslatorForm extends Control {

    private $request;
    private $translateText;

    public function __construct(Request $request, TranslateText $translateText) {
        $this->request = $request;
        $this->translateText = $translateText;
    }

    public function render(): void {
        $this->template->setFile(__DIR__ . "/translatorForm.latte");
        $this->template->render();
    }

    public function renderScripts(): void {
        $this->template->setFile(__DIR__ . "/scripts.latte");
        $this->template->render();
    }

    public function handleTranslate(): \stdClass {
        $translationText = $this->request->getPost("translationText");
        $translatedText = $this->translateText->doIt($translationText);
        return $this->getPresenter()->sendJson([
            "status" => "ok",
            "text" => $translatedText
        ]);
    }
}