<?php

namespace ionesculiviucristian\LaravelSimpleTree\Tests;

use Orchestra\Testbench\TestCase;
use ionesculiviucristian\LaravelSimpleTree\LaravelSimpleTree;

class LaravelSimpleTreeTest extends TestCase
{
    /** @test */
    public function is_builds_the_tree_correctly()
    {
        $data = [
            ['id' => 1, 'parent_id' => 0],
                ['id' => 2, 'parent_id' => 1],
                ['id' => 3, 'parent_id' => 1],
                    ['id' => 4, 'parent_id' => 3],
            ['id' => 5, 'parent_id' => 0],
            ['id' => 6, 'parent_id' => 0],
            ['id' => 7, 'parent_id' => 0],
                ['id' => 8, 'parent_id' => 7],
            ['id' => 9, 'parent_id' => 0],
        ];

        $tree = [
            ['id' => 1, 'parent_id' => 0, 'children' => [
                ['id' => 2, 'parent_id' => 1],
                ['id' => 3, 'parent_id' => 1, 'children' => [
                    ['id' => 4, 'parent_id' => 3],
                ]],
            ]],
            ['id' => 5, 'parent_id' => 0],
            ['id' => 6, 'parent_id' => 0],
            ['id' => 7, 'parent_id' => 0, 'children' => [
                ['id' => 8, 'parent_id' => 7],
            ]],
            ['id' => 9, 'parent_id' => 0],
        ];

        $this->assertEquals(serialize($tree), serialize((new LaravelSimpleTree($data))->build()));
    }
}
