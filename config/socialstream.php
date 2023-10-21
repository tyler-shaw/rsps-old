<?php

use JoelButcher\Socialstream\Features;
use JoelButcher\Socialstream\Providers;

return [
    'middleware' => ['web'],
    'prompt' => 'Or Login Via',
    'providers' => [
        Providers::github(),
        Providers::google(),
    ],
    'features' => [
        Features::createAccountOnFirstLogin(),
        Features::loginOnRegistration(),
        // Features::generateMissingEmails(),
        Features::rememberSession(),
        Features::providerAvatars(),
        Features::refreshOAuthTokens(),
    ],
];
