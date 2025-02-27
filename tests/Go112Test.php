<?php

namespace Tests;

class Go112Test extends Base
{
    protected string $sdkName = 'go';
    protected string $sdkPlatform = 'server';
    protected string $sdkLanguage = 'go';
    protected string $version = '0.0.1';

    protected string $language = 'go';
    protected string $class = 'Appwrite\SDK\Language\Go';
    protected array $build = [
        'mkdir -p tests/tmp/go/src/github.com/repoowner/sdk-for-go',
        'cp -Rf tests/sdks/go/* tests/tmp/go/src/github.com/repoowner/sdk-for-go/'
    ];
    protected string $command =
        'docker run --network="mockapi" --rm -v $(pwd):/app -w /app golang:1.12 sh -c "cd tests/languages/go/ && ./test.sh"';
    protected array $expectedOutput = [
        ...Base::FOO_RESPONSES,
        ...Base::BAR_RESPONSES,
        ...Base::GENERAL_RESPONSES,
        ...Base::EXTENDED_GENERAL_RESPONSES,
        ...Base::EXCEPTION_RESPONSES,
    ];
}
