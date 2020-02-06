<?php


namespace Xpat\TinkoffBundle\Service;


use Xpat\TinkoffBundle\Entity\InitParameters;
use Xpat\TinkoffBundle\Entity\RequestResult;

class TinkoffPaymentService
{
    protected $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @param InitParameters $initParameters
     * @return RequestResult
     * @throws \Exception
     */
    public function initPayment(InitParameters $initParameters) : RequestResult
    {
        $result = $this->post("v2/Init", $initParameters);

        return new RequestResult($result);

    }


    /**
     * @param InitParameters $parameters
     * @return RequestResult
     * @throws \Exception
     */
    public function getState(InitParameters $parameters)
    {
        $result = $this->post("v2/GetState", $parameters);
        return new RequestResult($result);
    }

    /**
     * @param InitParameters $parameters
     * @return RequestResult
     * @throws \Exception
     */
    public function cancel(InitParameters $parameters)
    {
        $result = $this->post("v2/Cancel", $parameters);
        return new RequestResult($result);
    }


    /**
     * @param string $url
     * @param InitParameters $parameters
     * @return array|mixed
     * @throws \Exception
     */
    private function post(string $url, InitParameters $parameters)
    {
        $args = $this->getArgs($parameters);
        $url = $this->combineUrl($this->apiUrl,$url);

        $curl = curl_init();
        if (!$curl) {
            throw new \Exception(sprintf('Can not create connection to %s with args %s', $url, $args));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($args))
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $args);
        $out = curl_exec($curl);

        $result = json_decode($out);
        if (is_object($result)) {
            $result = (array)$result;
        }

        $error = curl_error($curl);
        curl_close($curl);

        if (!is_array($result)) {
            throw new \Exception(sprintf('Cannot parse result as json. Curl error: "%s"', $error));
        }
        return $result;
    }

    protected function combineUrl()
    {
        $args = func_get_args();
        $url = '';
        foreach ($args as $arg) {
            if (!is_string($arg)) {
                continue;
            }
            if ($arg[strlen($arg) - 1] !== '/') {
                $arg .= '/';
            }
            $url .= $arg;
        }

        return $url;
    }

    /**
     * @param InitParameters $initParameters
     * @return array|false|string
     */
    private function getArgs(InitParameters $initParameters)
    {
        $args = $initParameters->_toArray();
        $args['Token'] = $this->_genToken($args);

        if (isset($args['Password'])) {
            unset($args['Password']);
        }
        if (is_array($args)) {
            $args = json_encode($args);
        }
        return $args;
    }

    /**
     * Generates token
     *
     * @param array $args array of query params
     *
     * @return string
     */
    protected function _genToken($args)
    {

        if (isset($args['DATA'])) {
            unset($args['DATA']);
        }
        if (isset($args['Receipt'])) {
            unset($args['Receipt']);
        }
        ksort($args);
        $token = hash('sha256', implode("",$args));

        return $token;
    }


}