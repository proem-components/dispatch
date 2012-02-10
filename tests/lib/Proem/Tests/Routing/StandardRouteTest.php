<?php

/**
 * The MIT License
 *
 * Copyright (c) 2010 - 2012 Tony R Quilkey <trq@proemframework.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Proem\Tests;

use Proem\Routing\Route\Standard;

class StandardRouteTest extends \PHPUnit_Framework_TestCase
{
    public function testCanInstantiateAsset()
    {
        $r = new Standard([]);
        $this->assertInstanceOf('Proem\Routing\Route\Generic', $r);
    }

    public function testController()
    {
        $route = new Standard([
            'rule'      => '/:controller/:action/:params'
        ]);
        $route->process('/foo/bar/a/b');

        $this->assertTrue($route->getPayload()->isPopulated());
        $this->assertEquals('foo', $route->getPayload()->getParam('controller'));
        $this->assertEquals('bar', $route->getPayload()->getParam('action'));
        $this->assertEquals('b', $route->getPayload()->getParam('a'));
    }

    public function testModule()
    {
        $route = new Standard([
            'rule'      => '/:module/:controller/:action/:params'
        ]);
        $route->process('/bob/foo/bar/a/b');

        $this->assertTrue($route->getPayload()->isPopulated());
        $this->assertEquals('bob', $route->getPayload()->getParam('module'));
        $this->assertEquals('foo', $route->getPayload()->getParam('controller'));
        $this->assertEquals('bar', $route->getPayload()->getParam('action'));
        $this->assertEquals('b', $route->getPayload()->getParam('a'));
    }

    public function testAlphaFilter()
    {
        $route = new Standard([
            'rule'      => '/:data',
            'filters'   => ['data' => ':alpha']
        ]);
        $route->process('/foo');

        $this->assertTrue($route->getPayload()->isPopulated());
        $this->assertEquals('foo', $route->getPayload()->getParam('data'));

        $route = new Standard([
            'rule'      => '/:data',
            'filters'   => ['data' => ':alpha']
        ]);
        $route->process('/123');

        $this->assertFalse($route->getPayload()->isPopulated());
    }
}
