<?php

namespace Tests\Model\Translator;

use App\Model\Translator\EmptyWordRule;
use Tester\Assert;

require __DIR__ . "/../../bootstrap.php";

class EmptyWordRuleTest extends \Tester\TestCase {
    
    public function testIsMatched() {
        $emptyWordRule = new EmptyWordRule("");
        Assert::true($emptyWordRule->isMatched());
        $emptyWordRule = new EmptyWordRule("vdfbgfndrg");
        Assert::false($emptyWordRule->isMatched());
    }

    public function testCompileTranslation() {
        $emptyWordRule = new EmptyWordRule("");
        Assert::same("", $emptyWordRule->compileTranslation());
    }
}

$testCase = new EmptyWordRuleTest();
$testCase->run();