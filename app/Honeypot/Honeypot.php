<?php


namespace App\Honeypot;


use Illuminate\Http\Request;

class Honeypot
{
    protected array $config;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->config = config('honeypot');
    }

    public function detect(): bool
    {
        if (! $this->enabled()){
            return false;
        }

        if (!$this->request->has($this->config['field_name'])) {
            return true;
        }

        if (!empty($this->request->input($this->config['field_name']))) {
            return true;
        }

        if ($this->submittedTooQuickly() <= $this->config['minimum_time']) {
            return true;
        }

        return false;
    }

    private function enabled(): bool
    {
        return (!$this->config['enabled']);
    }

    private function submittedTooQuickly(): float
    {
        return microtime(true) - $this->request->input($this->config['field_time_name']);
    }

    private function abort()
    {
        abort(422, 'Spam detected.');
    }
}
