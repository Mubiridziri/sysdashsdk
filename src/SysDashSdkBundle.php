<?php

namespace Mubiridziri\Sysdashsdk;


use Mubiridziri\Sysdashsdk\DependencyInjection\SysDashSDKExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SysDashSdkBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new SysDashSDKExtension();
        }
        return $this->extension;
    }
}
