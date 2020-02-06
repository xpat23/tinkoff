<?php


namespace Xpat\TinkoffBundle\Service;


use Symfony\Component\Routing\RouterInterface;
use Xpat\TinkoffBundle\Entity\InitParameters;

class PaymentParameterBuilder
{

    protected $terminalKey;
    protected $notificationUrl;
    protected $successUrl;
    protected $failUrl;
    private $password;

    public function __construct(
        $terminalKey,
        $password,
        RouterInterface $router,
        $notificationRoute = null,
        $successRoute = null,
        $failRoute = null
    )
    {
        $this->password = $password;
        $this->terminalKey = $terminalKey;

        if ($notificationRoute) {
            $this->notificationUrl = $router->generate($notificationRoute,[],RouterInterface::ABSOLUTE_URL);
        }

        if ($successRoute) {
            $this->successUrl = $router->generate($successRoute,[],RouterInterface::ABSOLUTE_URL);
        }

        if ($failRoute) {
            $this->failUrl = $router->generate($failRoute,[],RouterInterface::ABSOLUTE_URL);
        }

    }

    public function build()
    {
        $param = new InitParameters();
        $param->setTerminalKey($this->terminalKey);
        $param->setPassword($this->password);
        $param->setNotificationURL($this->notificationUrl);
        $param->setSuccessURL($this->successUrl);
        $param->setFailURL($this->failUrl);

        return $param;

    }

}