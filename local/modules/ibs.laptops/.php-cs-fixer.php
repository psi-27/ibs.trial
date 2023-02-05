<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude("vendor")
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        "@PSR12" => true,
        "array_syntax" => ["syntax" => 'short'],
        "binary_operator_spaces" => ["operators" => ["=>" => "align_single_space_minimal_by_scope"]]
    ])
    ->setFinder($finder)
;