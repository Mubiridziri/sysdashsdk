<?php

namespace Mubiridziri\Sysdashsdk;


use Mubiridziri\Sysdashsdk\DependencyInjection\SysDashSDKExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SysDashSdkBundle extends Bundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new SysDashSDKExtension();
        }
        return $this->extension;
    }
}
