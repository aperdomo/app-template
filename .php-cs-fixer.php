<?php

$finder = PhpCsFixer\Finder::create()
    ->in(['app', 'tests']);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'php_unit_method_casing' => ['case' => 'snake_case'],
    ])
    ->setFinder($finder);
