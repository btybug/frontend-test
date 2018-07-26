<?php

namespace Btybug\btybug\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\TransformsRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class CustomSCMiddleware
 * @package App\Http\Middleware
 */
class ConvertEmptyStingsToNullBty extends TransformsRequest
{
    public $req;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    /**
     * @var
     */
    public $except = [
        '/admin/uploads/application/*',
    ];


    public function pattern($patterns,$url)
    {
        foreach ($patterns as $pattern) {
            if (\Str::is($pattern, $url)) {
                return true;
            }
        }
    }

    public function handle($request, Closure $next, ...$attributes)
    {
        $this->attributes = $attributes;

        $this->req = $request->getRequestUri();
        $this->clean($request);

        return $next($request);
    }

    /**
     * Clean the request's data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clean($request)
    {
        $this->cleanParameterBag($request->query);

        if ($request->isJson()) {
            $this->cleanParameterBag($request->json());
        } else {
            $this->cleanParameterBag($request->request);
        }
    }

    /**
     * Clean the data in the parameter bag.
     *
     * @param  \Symfony\Component\HttpFoundation\ParameterBag  $bag
     * @return void
     */
    protected function cleanParameterBag(ParameterBag $bag)
    {
        $bag->replace($this->cleanArray($bag->all()));
    }

    /**
     * Clean the data in the given array.
     *
     * @param  array  $data
     * @return array
     */
    protected function cleanArray(array $data)
    {
        return collect($data)->map(function ($value, $key) {
            return $this->cleanValue($key, $value);
        })->all();
    }

    /**
     * Clean the given value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function cleanValue($key, $value)
    {
        if (is_array($value)) {
            return $this->cleanArray($value);
        }
        return $this->transform($key, $value);
    }

    public function transform($key, $value)
    {
        if( $this->pattern($this->except,$this->req)){
            return $value;
        }

        return is_string($value) && $value === '' ? null : $value;
    }
}
