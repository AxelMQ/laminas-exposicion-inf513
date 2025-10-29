<?php
namespace Application;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ModuleManager\Feature\ServiceProviderInterface;
use Laminas\ModuleManager\Feature\ControllerProviderInterface;
use Laminas\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements 
    ConfigProviderInterface,
    ServiceProviderInterface,
    ControllerProviderInterface,
    ViewHelperProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return [];
    }
    
    public function getControllerConfig()
    {
        return [];
    }
    
    public function getViewHelperConfig()
    {
        return [];
    }
}
