<?php

namespace App\Services;

use MoonShine\Contracts\ColorManager\ColorManagerContract;

class ThemeApplier
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ColorManagerContract $colorManager) {}

    public function theme3(): void
    {
        $this->colorManager->background('#052B38')
            ->content('#073A4B')
            ->tableRow('#0A5770')
            ->borders('#0A5770')
            ->buttons('#0D7496')
            ->dividers('#0A5770')
            ->primary('#118AB2')
            ->secondary('#06D6A0')
            ->successBg('#28b463')
            ->successText('#d4efdf')
            ->warningBg('#d68910')
            ->warningText('#f9e79f')
            ->errorBg('#943126')
            ->errorText('#f5b7b1')
            ->infoBg('#5dade2')
            ->infoText('#d6eaf8');

        $this->colorManager->successBg('#239b56', dark: true)
            ->successText('#82e0aa', dark: true)
            ->warningBg('#d68910', dark: true)
            ->warningText('#f9e79f', dark: true)
            ->errorBg('#a93226', dark: true)
            ->errorText('#f5b7b1', dark: true)
            ->infoBg('#1f618d', dark: true)
            ->infoText('#aed6f1', dark: true);
    }
}
