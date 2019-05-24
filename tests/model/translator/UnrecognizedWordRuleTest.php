<?php

namespace Tests\Model\Translator;

use App\Model\Translator\UnrecognizedWordRule;
use Tester\Assert;

require __DIR__ . "/../../bootstrap.php";

class UnrecognizedWordRuleTest extends \Tester\TestCase {
    
    public function testIsMatched() {
        $unrecognizedWordRule = new UnrecognizedWordRule("1654894");
        Assert::true($unrecognizedWordRule->isMatched());
        $unrecognizedWordRule = new UnrecognizedWordRule("nrgiubgbwg");
        Assert::true($unrecognizedWordRule->isMatched());
    }

    public function testCompileTranslation() {
        $unrecognizedWordRule = new UnrecognizedWordRule("168946468");
        Assert::same("168946468", $unrecognizedWordRule->compileTranslation());
        $unrecognizedWordRule = new UnrecognizedWordRule("egreřžzgeč");
        Assert::same("egreřžzgeč", $unrecognizedWordRule->compileTranslation());
    }
}

$testCase = new UnrecognizedWordRuleTest();
$testCase->run();