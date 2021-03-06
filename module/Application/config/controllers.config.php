<?php
/**
 * @package zf3-blog
 * @author Rtransat
 */

namespace Application;

use Shared\Controller\ServiceManagerAwareControllerFactory;

return [
    'factories' => [
        Controller\IndexController::class => ServiceManagerAwareControllerFactory::class,
        Controller\UserController::class => ServiceManagerAwareControllerFactory::class,
    ],
];
