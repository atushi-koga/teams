<?php

namespace Tests;

use Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setInitData()
    {
        Artisan::call('migrate:refresh', ['--seed' => true]);
    }
}
