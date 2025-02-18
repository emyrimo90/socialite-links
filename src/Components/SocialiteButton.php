<?php

namespace EmanElroukh\SocialiteLinks\Components;

use Illuminate\View\View;
use Illuminate\View\Component;

class SocialiteButton extends Component
{

    public function __construct(public string $provider, public ?string $url='')
    {
    }

    public function render(): View
    {
        return view('SocialiteLinks::button');
    }
}
