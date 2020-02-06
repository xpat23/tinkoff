<?php


namespace Xpat\TinkoffBundle\Service;


use Symfony\Component\HttpFoundation\Request;
use Xpat\TinkoffBundle\Entity\RequestResult;

class PaymentNotificationService
{

    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function handleRequest(Request $request) : RequestResult
    {
        return new RequestResult($request->request->all());
    }

    public function tokenIsValid(Request $request)
    {
        $data = $request->request->all();

        if (!isset($data['Token'])) {
            return false;
        }

        $expected = $data['Token'];

        unset($data['Token']);

        $data['Password'] = $this->password;

        $data['Success'] = $data['Success'] ? "true" : "false";
        ksort($data);

        $str = implode("",$data);

        $token = hash('sha256', $str);

        return $token == $expected;


    }

}