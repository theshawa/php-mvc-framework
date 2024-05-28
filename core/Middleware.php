<?php

namespace core;

use Exception;

interface Middleware
{
    /**
     * @param Request $request
     * @param Response $response
     * @return ?string
     * @throws Exception
     */
    public function execute(Request $request, Response $response): ?string;
}