<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Honeypot
{
    protected array $config;

    public function __construct()
    {
        $this->config = config('honeypot');
    }

    public function handle(Request $request, Closure $next)
    {
        if(! $this->config['enabled']) {
            return $next($request);
        }

        if(! $request->has($this->config['field_name'])){
            $this->abort();
        }

        if(!empty($request->input($this->config['field_name']))) {
            $this->abort();
        }

        if($this->timeToSubmitForm($request) <= $this->config['minimum_time']) {
            $this->abort();
        }

        return $next($request);
    }

    private function timeToSubmitForm(Request $request): float
    {
        return microtime(true) - $request->input($this->config['field_time_name']);
    }

    private function abort()
    {
        abort(422, 'Spam detected.');
    }
}
