<?php

namespace ShamarKellman\LaravelRecaptcha\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class ReCaptchaRule implements Rule
{
    protected string $errorMessage;

    public function passes($attribute, $value): bool
    {
        if (empty($value)) {
            $this->errorMessage = ':attribute field is required.';

            return false;
        }

        $recaptcha = new ReCaptcha(config('recaptcha.private_key'));
        $resp = $recaptcha->setExpectedHostname(optional(request())->server('SERVER_NAME'))
            ->setScoreThreshold(config('recaptcha.score_threshold', 0.5))
            ->verify($value, optional(request())->ip());

        if (!$resp->isSuccess()) {
            $this->errorMessage = 'ReCaptcha field is required.';

            return false;
        }

        if ($resp->getScore() < config('recaptcha.score_threshold', 0.5)) {
            $this->errorMessage = 'Failed to validate captcha.';

            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->errorMessage;
    }
}
