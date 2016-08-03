<?php
namespace App\RelevantMedia\Services\Captcha;

use App\RelevantMedia\Contracts\Captcha;

/**
 * Class AbstractCaptcha
 * @package App\RelevantMedia\Services\Captcha
 */
abstract class AbstractCaptcha implements Captcha
{
    /**
     * Object of concrete captcha
     * @var object
     */
    protected $instance;

    /**
     * @inheritDoc
     */
    abstract public function getCaptcha();

    /**
     * @inheritDoc
     */
    abstract public function checkCaptcha($input);
}