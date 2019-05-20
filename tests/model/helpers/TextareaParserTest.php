<?php

namespace Tests\Model\Helpers;

use Tester\Assert;
use Nette\DI\Container;

$container = require __DIR__ . "/../../bootstrap.php";

class TextareaParserTest extends \Tester\TestCase {
  
    private $textareaParser;
    
    public function __construct(Container $container) {
        $this->textareaParser = $container->getByType("App\Helpers\TextareaParser");
    }
    
    public function testToMultiArray() {
        Assert::same([[""]], $this->textareaParser->toMultiArray(""));
        Assert::same([["", ""]], $this->textareaParser->toMultiArray(" "));
        Assert::same([["happy", "apple"]], $this->textareaParser->toMultiArray("happy apple"));
        Assert::same([["happy", "apple"], ["eagle"]], $this->textareaParser->toMultiArray("happy apple\r\neagle"));
    }
    
    public function testToText() {
        Assert::same("", $this->textareaParser->toText([[""]]));
        Assert::same(" ", $this->textareaParser->toText([["", ""]]));
        Assert::same("happy apple", $this->textareaParser->toText([["happy", "apple"]]));
        Assert::same("happy apple\r\neagle", $this->textareaParser->toText([["happy", "apple"], ["eagle"]]));
    }
}

$testCase = new TextareaParserTest($container);
$testCase->run();