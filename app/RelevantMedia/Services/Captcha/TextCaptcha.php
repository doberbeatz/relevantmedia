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
        return view('captcha.text', ['img_html' => captcha_img()]);
    }

    /**
     * @inheritDoc
     */
    public function checkCaptcha($input) {
        return captcha_check($input);
    }
}