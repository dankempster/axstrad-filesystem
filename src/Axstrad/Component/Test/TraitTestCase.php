<?php
namespace Axstrad\Component\Test;


/**
 * Axstrad\Component\Test\TraitTestCase
 */
abstract class TraitTestCase extends TestCase
{
    protected $trait = null;


    public function setUp()
    {
        $this->fixture = $this->getMockForTrait($this->trait);
    }
}
