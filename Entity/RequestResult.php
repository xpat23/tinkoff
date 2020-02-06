<?php


namespace Xpat\TinkoffBundle\Entity;


class RequestResult
{
    const STATUS_NEW =  "NEW";
    const STATUS_REJECTED =  "REJECTED";
    const STATUS_REVERSED =  "REVERSED";
    const STATUS_AUTHORIZED =  "AUTHORIZED";
    const STATUS_CONFIRMED =  "CONFIRMED";
    const STATUS_PARTIAL_REFUNDED =  "PARTIAL_REFUNDED";
    const STATUS_REFUNDED =  "REFUNDED";

    /**
     * TerminalKey	Идентификатор терминала. Выдается продавцу банком при заведении терминала
     * @var string|null
     */
    protected $terminalKey;

    /**
     * Amount	Сумма в копейках
     * @var integer|null
     */
    protected $amount;

    /**
     * OrderId	Идентификатор заказа в системе продавца
     * @var string|null
     */
    protected $orderId;

    /**
     * Success	Выполнение платежа	boolean	Да
     * @var boolean|null
     */
    protected $success;

    /**
     * NEW|REJECTED
     * Status	Статус платежа
     * @var string|null
     */
    protected $status;

    /**
     * PaymentId	Идентификатор платежа в системе банка
     * @var integer|null
     */
    protected $paymentId;

    /**
     * ErrorCode	Код ошибки
     * Если ошибки не произошло, передайте значение «0»
     * @var integer|null
     */
    protected $errorCode;

    /**
     * PaymentURL	Ссылка на платежную форму	string(100)	Нет
     * @var string|null
     */
    protected $paymentURL;

    /**
     * Message	Краткое описание ошибки	string	Нет
     * @var string|null
     */
    protected $message;


    /**
     * Details	Подробное описание ошибки	string	Нет
     * @var string|null
     */
    protected $details;

    /**
     * @var string|null
     */
    protected $token;

    /**
     * @return string|null
     */
    public function getTerminalKey(): ?string
    {
        return $this->terminalKey;
    }

    /**
     * @param string|null $terminalKey
     */
    public function setTerminalKey(?string $terminalKey): void
    {
        $this->terminalKey = $terminalKey;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param string|null $orderId
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }

    /**
     * @param bool|null $success
     */
    public function setSuccess(?bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int|null
     */
    public function getPaymentId(): ?int
    {
        return $this->paymentId;
    }

    /**
     * @param int|null $paymentId
     */
    public function setPaymentId(?int $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int|null
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * @param int|null $errorCode
     */
    public function setErrorCode(?int $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string|null
     */
    public function getPaymentURL(): ?string
    {
        return $this->paymentURL;
    }

    /**
     * @param string|null $paymentURL
     */
    public function setPaymentURL(?string $paymentURL): void
    {
        $this->paymentURL = $paymentURL;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getDetails(): ?string
    {
        return $this->details;
    }

    /**
     * @param string|null $details
     */
    public function setDetails(?string $details): void
    {
        $this->details = $details;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }


    function __construct(array $response)
    {
        if (isset($response['TerminalKey'])) {
            $this->terminalKey = $response['TerminalKey'];
        }
        if (isset($response['Amount'])) {
            $this->amount = $response['Amount'];
        }

        if (isset($response['OrderId'])) {
            $this->orderId = $response['OrderId'];
        }

        if (isset($response['Success'])) {
            $this->success = $response['Success'];
        }

        if (isset($response['Status'])) {
            $this->status = $response['Status'];
        }
        if (isset($response['PaymentId'])) {
            $this->paymentId = $response['PaymentId'];
        }

        if (isset($response['ErrorCode'])) {
            $this->errorCode = $response['ErrorCode'];
        }
        if (isset($response['PaymentURL'])) {
            $this->paymentURL = $response['PaymentURL'];
        }
        if (isset($response['Message'])) {
            $this->message = $response['Message'];
        }
        if (isset($response['Details'])) {
            $this->details = $response['Details'];
        }
        if (isset($response['Token'])) {
            $this->token = $response['Token'];
        }
    }

}