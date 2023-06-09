<?php

namespace App\Services;

class ConfigService
{
    public static function has(string $pageType, string $option): bool
    {
        return array_key_exists($pageType, config('cms.options.' . $option . '.types'));
    }

    public static function hasNot(string $pageType, string $option): bool
    {
        return !self::has($pageType, $option);
    }

    public static function get(string $pageType, string $option): array
    {
        return config('cms.options.' . $option . '.types.' . $pageType);
    }

    public static function isDisable(string $pageType, string $option): bool
    {
        return in_array($pageType, config('cms.options_disabled.types.' . $option));
    }

    public static function getTitle(string $pageType): string
    {
        if (!empty(config('cms.options_list.types.' . $pageType . '.title'))) {
            return config('cms.options_list.types.' . $pageType . '.title');
        }

        return 'Liste des pages';
    }

    public static function getSubtitle(string $pageType): string
    {
        if (!empty(config('cms.options_list.types.' . $pageType . '.subtitle'))) {
            return config('cms.options_list.types.' . $pageType . '.subtitle');
        }

        return '';
    }

}