<?php

namespace App\Honeypot\Http\Middleware;

use App\Honeypot\Honeypot;
use Closure;
use Illuminate\Http\Request;

class BlockSpam
{
    protected Honeypot $honeypot;

    public function __construct(Honeypot $honeypot)
    {
        $this->honeypot = $honeypot;
    }

    public function handle(Request $request, Closure $next)
    {
        if ($this->honeypot->detect()) {
            $this->abort();
        }

        return $next($request);
    }

    protected function abort(): void
    {
        $this->honeypot->abort();
    }

}
