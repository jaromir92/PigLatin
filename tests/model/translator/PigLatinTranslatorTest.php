<?php

namespace Tests\Model\Translator;

use Nette\DI\Container;
use Tester\Assert;

$container = require __DIR__ . "/../../bootstrap.php";

class PigLatinTranslatorTest extends \Tester\TestCase {

    private $pigLatinTranslator;

    public function __construct(Container $container) {
        $this->pigLatinTranslator = $container->getByType("App\Model\Translator\PigLatinTranslator");
    }

    public function testTranslate() {
        Assert::same("", $this->pigLatinTranslator->translate(""));
        Assert::same("441648", $this->pigLatinTranslator->translate("441648"));
        Assert::same("eagle-yay", $this->pigLatinTranslator->translate("eagle"));
        Assert::same("anana-bay", $this->pigLatinTranslator->translate("banana"));
        Assert::same("write-yay", $this->pigLatinTranslator->translate("write"));
        Assert::same("ee-thray", $this->pigLatinTranslator->translate("three"));
        Assert::same("ščřščtščgčššg", $this->pigLatinTranslator->translate("ščřščtščgčššg"));
        Assert::same("uestion-qay", $this->pigLatinTranslator->translate("question"));
        Assert::notSame("ite-wray", $this->pigLatinTranslator->translate("write"));
        Assert::notSame("estion-quay", $this->pigLatinTranslator->translate("question"));
    }
}

$testCase = new PigLatinTranslatorTest($container);
$testCase->run();