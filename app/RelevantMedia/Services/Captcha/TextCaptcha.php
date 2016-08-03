<?php
namespace App\RelevantMedia\Services\Captcha;

/**
 * Class TextCaptcha
 * @package App\RelevantMedia\Services\Captcha
 */
class TextCaptcha extends AbstractCaptcha
{
    /**
     * @inheritDoc
     */
    public function getCaptcha() {
        return captcha_src();
    }

    /**
     * @inheritDoc
     */
    public function checkCaptcha($input) {
        captcha_check($input);
    }
}