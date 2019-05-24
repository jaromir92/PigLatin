<?php

namespace Tests\Model\Translator;

use App\Model\Translator\ConsonantWordRule;
use Tester\Assert;

require __DIR__ . "/../../bootstrap.php";

class ConsonantWordRuleTest extends \Tester\TestCase {
    
    public function testIsMatched() {
        $consonantWordRule = new ConsonantWordRule("happy");
        Assert::true($consonantWordRule->isMatched());
        $consonantWordRule = new ConsonantWordRule("eagle");
        Assert::false($consonantWordRule->isMatched());
    }

    public function testCompileTranslation() {
        $consonantWordRule = new ConsonantWordRule("happy");
        Assert::same("appy-hay", $consonantWordRule->compileTranslation());
        $consonantWordRule = new ConsonantWordRule("dough");
        Assert::same("ough-day", $consonantWordRule->compileTranslation());
    }
}

$testCase = new ConsonantWordRuleTest();
$testCase->run();