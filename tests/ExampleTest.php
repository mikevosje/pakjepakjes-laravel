<?php

namespace Pakjepakjes\Pakjepakjes\Tests;

use Orchestra\Testbench\TestCase;
use Pakjepakjes\Pakjepakjes\PakjepakjesServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [PakjepakjesServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
