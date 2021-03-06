<?php

declare(strict_types=1);

namespace Yii\Extension\User\Tests\App\ViewInjection;

use Yii\Extension\User\Tests\App\ApplicationParameters;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\I18n\Locale;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;

final class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    private Aliases $aliases;
    private ApplicationParameters $applicationParameters;
    private AssetManager $assetManager;
    private Locale $locale;
    private UrlGeneratorInterface $urlGenerator;
    private UrlMatcherInterface $urlMatcher;

    public function __construct(
        Aliases $aliases,
        ApplicationParameters $applicationParameters,
        AssetManager $assetManager,
        Locale $locale,
        UrlGeneratorInterface $urlGenerator,
        UrlMatcherInterface $urlMatcher
    ) {
        $this->aliases = $aliases;
        $this->applicationParameters = $applicationParameters;
        $this->assetManager = $assetManager;
        $this->locale = $locale;
        $this->urlGenerator = $urlGenerator;
        $this->urlMatcher = $urlMatcher;
    }

    public function getLayoutParameters(): array
    {
        return [
            'aliases' => $this->aliases,
            'applicationParameters' => $this->applicationParameters,
            'assetManager' => $this->assetManager,
            'locale' => $this->locale,
            'urlGenerator' => $this->urlGenerator,
            'urlMatcher' => $this->urlMatcher,
        ];
    }
}
