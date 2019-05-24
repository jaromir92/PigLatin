<?php

namespace Tests\Model\Translator;

use App\Model\Translator\SilentConsonantWordRule;
use Tester\Assert;

require __DIR__ . "/../../bootstrap.php";

class SilentConsonantWordRuleTest extends \Tester\TestCase {
    
    public function testIsMatched() {
        $silentConsonantWordRule = new SilentConsonantWordRule("know");
        Assert::true($silentConsonantWordRule->isMatched());
        $silentConsonantWordRule = new SilentConsonantWordRule("banana");
        Assert::false($silentConsonantWordRule->isMatched());
    }

    public function testCompileTranslation() {
        $silentConsonantWordRule = new SilentConsonantWordRule("know");
        Assert::same("know-yay", $silentConsonantWordRule->compileTranslation());
        $silentConsonantWordRule = new $silentConsonantWordRule("write");
        Assert::same("write-yay", $silentConsonantWordRule->compileTranslation());
    }
}

$testCase = new SilentConsonantWordRuleTest();
$testCase->run();