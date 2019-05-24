<?php

namespace Tests\Model\Translator;

use App\Model\Translator\VowelWordRule;
use Tester\Assert;

require __DIR__ . "/../../bootstrap.php";

class VowelWordRuleTest extends \Tester\TestCase {
    
    public function testIsMatched() {
        $vowelWordRule = new VowelWordRule("eagle");
        Assert::true($vowelWordRule->isMatched());
        $vowelWordRule = new VowelWordRule("jungle");
        Assert::false($vowelWordRule->isMatched());
    }

    public function testCompileTranslation() {
        $vowelWordRule = new VowelWordRule("eagle");
        Assert::same("eagle-yay", $vowelWordRule->compileTranslation());
        $vowelWordRule = new VowelWordRule("apple");
        Assert::same("apple-yay", $vowelWordRule->compileTranslation());
    }
}

$testCase = new VowelWordRuleTest();
$testCase->run();