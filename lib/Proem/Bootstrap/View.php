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


/**
 * @namespace Proem\Bootstrap
 */
namespace Proem\Bootstrap;

use Proem\Service\AssetManagerInterface;
use Proem\Filter\ChainEventAbstract;
use Proem\Signal\Event;

/**
 * The default "View" filter chain event.
 */
class View extends ChainEventAbstract
{
    /**
     * Called on the way *in* to the filter chain.
     *
     * @param Proem\Service\AssetManagerInterface $assetManager
     */
    public function in(AssetManagerInterface $assetManager)
    {
    }

    /**
     * Called on the way *out* of the filter chain.
     *
     * @param Proem\Service\AssetManagerInterface $assetManager
     */
    public function out(AssetManagerInterface $assets)
    {
    }
}