<?php
namespace App\RelevantMedia\Contracts;

/**
 * Interface Captcha
 * @package App\RelevantMedia\Contracts
 */
interface Captcha
{
    /**
     * Return html of captcha
     * @return string
     */
    public function getCaptcha();

    /**
     * Check if captcha is valid
     * @param $input
     * @return bool
     */
    public function checkCaptcha($input);
}
