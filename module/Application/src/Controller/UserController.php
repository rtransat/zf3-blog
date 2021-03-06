<?php
/**
 * @package zf3-blog
 * @author Rtransat
 */

namespace Application\Controller;

use Admin\Model\Infrastructure\Authentication\Storage;
use Zend\Authentication\AuthenticationService;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceManager;

class UserController extends AbstractActionController
{
    /** @var \Zend\ServiceManager\ServiceManager */
    private $serviceManager;

    /**
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @return \Zend\Http\Response
     */
    public function logoutAction(): Response
    {
        /** @var \Zend\Authentication\AuthenticationService $authentication */
        $authentication = $this->serviceManager->get(
            AuthenticationService::class
        );

        if ($authentication->hasIdentity() === false) {
            return $this->redirect()->toRoute('application');
        }

        /** @var \Admin\Model\Infrastructure\Authentication\Storage $storage */
        $sessionStorage = $this->serviceManager->get(Storage::class);
        $sessionStorage->forgetMe();

        $authentication->clearIdentity();

        return $this->redirect()->toRoute('application');
    }
}
