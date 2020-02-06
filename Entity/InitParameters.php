<?php


namespace Xpat\TinkoffBundle\Entity;

/**
 * Class InitParameters
 * @package Xpat\TinkoffBundle\Entity
 * @see  https://oplata.tinkoff.ru/develop/api/payments/init-request/#Receipt
 */
class InitParameters
{
    /**
     * TerminalKey    Идентификатор терминала. Выдается продавцу банком при заведении терминала
     * @var string|null
     * required
     */
    protected $terminalKey;

    /**
     * Amount    Сумма в копейках
     * number(10)
     * @var integer|null
     */
    protected $amount;

    /**
     * OrderId    Идентификатор заказа в системе продавца
     * required
     * @var string|null
     */
    protected $orderId;

    /**
     * IP    IP-адрес покупателя
     * optional
     * @var string|null
     */
    protected $ip;

    /**
     * Description    Описание заказа
     * optional
     * @var string|null
     */
    protected $description;

    /**
     * Token См. Подпись запроса
     * required
     * @var string|null
     */
    protected $token;

    /**
     * Language    Язык платежной формы:
     * optional
     * ru — русский
     * en — английский
     * @var string
     */
    protected $language;

    /**
     * Recurrent    Идентификатор родительского платежа
     * Передается со значением Y Для регистрации автоплатежа
     * optional
     * @var string|null
     */
    protected $recurrent;

    /**
     * CustomerKey    Идентификатор покупателя в системе продавца.
     * Передается вместе с параметром CardId. См. метод GetGardList    string(36)
     * Да, если передан параметр Recurrent
     * optional
     * @var string|null
     */
    protected $customerKey;

    /**
     * RedirectDueDate    Cрок жизни ссылки (не более 90 дней)
     * Временная метка по стандарту ISO8601 в формате YYYY-MM-DDThh:mm:ss±hh:mm
     * Если не передан, принимает значение 24 часа для платежа и 30 дней для счета
     * optional
     * @var string|null
     */
    protected $redirectDueDate;

    /**
     * NotificationURL    Адрес для получения http нотификаций
     * Если не передан, принимает значение, указанное в настройках терминала
     * optional
     * @var string|null
     */
    protected $notificationURL;

    /**
     * SuccessURL    Страница успеха    string    Нет
     * Если не передан, принимает значение, указанное в настройках терминала
     * optional
     * @var string|null
     */
    protected $successURL;

    /**
     * FailURL    Страница ошибки    string    Нет
     * Если не передан, принимает значение, указанное в настройках терминала
     * optional
     * @var string|null
     */
    protected $failURL;

    /**
     * PayType    Тип оплаты:
     * O — одностадийная
     *  T — двухстадийная
     * optional
     * @var string|null
     */
    protected $payType;

    /**
     * Receipt    Массив данных чека
     * optional
     * @var Receipt
     */
    protected $receipt;

    /**
     * Дополнительные параметры платежа в формате "ключ":"значение"
     * @var array
     */
    protected $data;

    /** @var string|null */
    protected $password;

    /** @var string|null */
    protected $paymentId;

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
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param string|null $ip
     */
    public function setIp(?string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
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

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string|null
     */
    public function getRecurrent(): ?string
    {
        return $this->recurrent;
    }

    /**
     * @param string|null $recurrent
     */
    public function setRecurrent(?string $recurrent): void
    {
        $this->recurrent = $recurrent;
    }

    /**
     * @return string|null
     */
    public function getCustomerKey(): ?string
    {
        return $this->customerKey;
    }

    /**
     * @param string|null $customerKey
     */
    public function setCustomerKey(?string $customerKey): void
    {
        $this->customerKey = $customerKey;
    }

    /**
     * @return string|null
     */
    public function getRedirectDueDate(): ?string
    {
        return $this->redirectDueDate;
    }

    /**
     * @param string|null $redirectDueDate
     */
    public function setRedirectDueDate(?string $redirectDueDate): void
    {
        $this->redirectDueDate = $redirectDueDate;
    }

    /**
     * @return string|null
     */
    public function getNotificationURL(): ?string
    {
        return $this->notificationURL;
    }

    /**
     * @param string|null $notificationURL
     */
    public function setNotificationURL(?string $notificationURL): void
    {
        $this->notificationURL = $notificationURL;
    }

    /**
     * @return string|null
     */
    public function getSuccessURL(): ?string
    {
        return $this->successURL;
    }

    /**
     * @param string|null $successURL
     */
    public function setSuccessURL(?string $successURL): void
    {
        $this->successURL = $successURL;
    }

    /**
     * @return string|null
     */
    public function getFailURL(): ?string
    {
        return $this->failURL;
    }

    /**
     * @param string|null $failURL
     */
    public function setFailURL(?string $failURL): void
    {
        $this->failURL = $failURL;
    }

    /**
     * @return string|null
     */
    public function getPayType(): ?string
    {
        return $this->payType;
    }

    /**
     * @param string|null $payType
     */
    public function setPayType(?string $payType): void
    {
        $this->payType = $payType;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return Receipt
     */
    public function getReceipt(): Receipt
    {
        return $this->receipt;
    }

    /**
     * @param Receipt $receipt
     */
    public function setReceipt(Receipt $receipt): void
    {
        $this->receipt = $receipt;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function _toArray(): array
    {
        $order = [
            'DATA' => $this->data,
            'TerminalKey' => $this->terminalKey,

        ];

        if (null !== $this->amount) {
            $order['Amount'] = $this->getKopeikaAmount();
        }

        if (null !== $this->paymentId) {
            $order['PaymentId'] = $this->paymentId;
        }

        if (null !== $this->orderId) {
            $order['OrderId'] = $this->orderId;
        }

        if (null !== $this->language) {
            $order['Language'] = $this->language;
        }

        if (null !== $this->getPassword()) {
            $order['Password'] = $this->getPassword();
        }

        if (null !== $this->notificationURL) {
            $order['NotificationURL'] = $this->notificationURL;
        }

        if (null !== $this->successURL) {
            $order['SuccessURL'] = $this->successURL;
        }

        if (null !== $this->failURL) {
            $order['FailURL'] = $this->failURL;
        }

        if (null !== $this->description) {
            $order['Description'] = $this->description;
        }

        if (null != $this->recurrent) {
            $order['Recurrent'] = $this->recurrent;
        }

        if (null !== $this->customerKey) {
            $order['CustomerKey'] = $this->customerKey;
        }

        if (null !== $this->receipt) {
            $order['Receipt'] = $this->receipt->__toArray();
        }

        return $order;
    }


    public function getKopeikaAmount()
    {
        return ceil($this->getAmount() * 100);

    }

    public function __construct()
    {
        $this->receipt = new Receipt();
    }

    /**
     * @return string|null
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * @param string|null $paymentId
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }
}