<?php

namespace WebEvent\FrontOfficeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WebEventFrontOfficeBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
