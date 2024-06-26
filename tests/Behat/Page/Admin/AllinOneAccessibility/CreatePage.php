<?php

declare(strict_types=1);

namespace Tests\Skynettechnologies\SyliusAllinOneAccessibilityPlugin\Behat\Page\Admin\AllinOneAccessibility;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;
use Tests\Skynettechnologies\SyliusAllinOneAccessibilityPlugin\Behat\Behaviour\ContainsErrorTrait;
use Webmozart\Assert\Assert;

final class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    use ContainsErrorTrait;

    /**
     * @inheritdoc
     */
    public function fillCode(string $code): void
    {
        $this->getDocument()->fillField('Code', $code);
    }

    /**
     * @inheritdoc
     */
    public function fillUrl(string $url): void
    {
        $this->getDocument()->fillField('URL', $url);
    }

    /**
     * {@inheritdoc}
     */
    public function uploadFile(string $file, string $locator): void
    {
        $path = __DIR__.'/../../../Resources/images/'.$file;
        Assert::fileExists($path);
        $this->getDocument()->attachFileToField($locator, realpath($path));
    }
}
