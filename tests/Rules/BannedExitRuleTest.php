<?php

/*
 * This file is part of the phpstan/phpstan-banned-code project.
 *
 * (c) Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\PHPStan\Rules;

use PhpParser\Node\Expr\Exit_;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\BannedExitRule;
use PHPUnit\Framework\TestCase;

/**
 * @author Rémi Marseille <marseille@ekino.com>
 */
class BannedExitRuleTest extends TestCase
{
    /**
     * Tests getNodeType.
     */
    public function testGetNodeType()
    {
        $this->assertSame(Exit_::class, (new BannedExitRule())->getNodeType());
    }

    /**
     * Tests processNode.
     */
    public function testProcessNode()
    {
        $this->assertCount(0, (new BannedExitRule(false))->processNode($this->createMock(Exit_::class), $this->createMock(Scope::class)));
        $this->assertCount(1, (new BannedExitRule())->processNode($this->createMock(Exit_::class), $this->createMock(Scope::class)));
    }
}