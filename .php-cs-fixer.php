<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('somedir')
    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12'                                => true,
        'single_blank_line_at_eof'              => true,
        'align_multiline_comment'               => true,
        'multiline_comment_opening_closing'     => true,
        'no_blank_lines_after_phpdoc'           => true,
        'no_empty_comment'                      => false,
        'no_empty_phpdoc'                       => true,
        'array_indentation'                     => true,
        'blank_line_after_opening_tag'          => true,
        'linebreak_after_opening_tag'           => true,
        'explicit_indirect_variable'            => true,
        'explicit_string_variable'              => true,
        'lowercase_static_reference'            => true,
        'method_chaining_indentation'           => true,
        'echo_tag_syntax'                       => ['format' => 'long'],
        'no_blank_lines_after_class_opening'    => true,
        'no_trailing_comma_in_list_call'        => true,
        'no_trailing_comma_in_singleline_array' => true,
        'trailing_comma_in_multiline'           => [
            'elements' => ['arrays'],
        ],
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align',
                '='  => 'align',
            ],
        ],
        'array_syntax'                => ['syntax' => 'short'],
        'list_syntax'                 => ['syntax' => 'short'],
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
        ],
        'cast_spaces'                 => ['space' => 'single'],
        'class_attributes_separation' => [
            'elements' => [
                'const'        => 'one',
                'method'       => 'one',
                'property'     => 'one',
                'trait_import' => 'none',
            ],
        ],
        'ordered_imports'                   => ['sort_algorithm' => 'length'],
        'phpdoc_order_by_value'             => ['annotations' => ['covers']],
        'phpdoc_order'                      => true,
        'single_trait_insert_per_statement' => true,
        'no_unused_imports'                 => true,
    ])
    ->setFinder($finder);
