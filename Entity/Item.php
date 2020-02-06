<?php


namespace Xpat\TinkoffBundle\Entity;


class Item
{

    const TAX_NONE = "none"; //без НДС
    const PAYMENT_OBJECT_SERVICE = "service"; //услуга

    /**
     * Name	Наименование товара
     * required
     * @var string|null
     */
    protected $name;

    /**
     * Quantity Количество или вес товара
     * required
     * @var string|null
     */
    protected $quantity;

    /**
     * Amount Количество или вес товара
     * required
     * @var string|null
     */
    protected $amount;

    /**
     * Price	Цена товара в копейках
     * required
     * @var float|null
     */
    protected $price;

    /**
     * PaymentMethod	Признак способа расчета:
     * full_payment — полный расчет
     * full_prepayment — предоплата 100%
     * prepayment — предоплата
     * advance — аванс
     * partial_payment — частичный расчет и кредит
     * credit — передача в кредит
     * credit_payment — оплата кредита
     * Если не передан, в кассу отправляется значение full_payment
     * optional
     * @var string|null
     */
    protected $paymentMethod;

    /**
     * PaymentObject	Признак предмета расчета:
     * commodity — товар
     * excise — подакцизный товар
     * job — работа
     * service — услуга
     * gambling_bet — ставка азартной игры
     * gambling_prize — выигрыш азартной игры
     * lottery — лотерейный билет
     * lottery_prize — выигрыш лотереи
     * intellectual_activity — предоставление результатов интеллектуальной деятельности
     * payment — платежagent_commission — агентское вознаграждение
     * composite — составной предмет расчета
     * another — иной предмет расчета
     * string	Нет
     * Если не передан, в кассу отправляется значение commodity
     * optional
     * @var string|null
     */
    protected $paymentObject;

    /**
     * Tax	Ставка НДС:
     * none — без НДС
     * vat0 — 0%
     * vat10 — 10%
     * vat20 — 20%
     * vat110 — 10/110
     * vat120 — 20/120
     * @var string|null
     * required
     */
    protected $tax;

    /**
     * Ean13	Ean13
     * @var string|null
     * optional
     */
    protected $ean13;

    /**
     * ShopCode	Код магазина
     * @var string|null
     * optional
     */
    protected $shopCode;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param string|null $quantity
     */
    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @param string|null $amount
     */
    public function setAmount(?string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string|null $paymentMethod
     */
    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return string|null
     */
    public function getPaymentObject(): ?string
    {
        return $this->paymentObject;
    }

    /**
     * @param string|null $paymentObject
     */
    public function setPaymentObject(?string $paymentObject): void
    {
        $this->paymentObject = $paymentObject;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @param string|null $tax
     */
    public function setTax(?string $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @return string|null
     */
    public function getEan13(): ?string
    {
        return $this->ean13;
    }

    /**
     * @param string|null $ean13
     */
    public function setEan13(?string $ean13): void
    {
        $this->ean13 = $ean13;
    }

    /**
     * @return string|null
     */
    public function getShopCode(): ?string
    {
        return $this->shopCode;
    }

    /**
     * @param string|null $shopCode
     */
    public function setShopCode(?string $shopCode): void
    {
        $this->shopCode = $shopCode;
    }

    public function __toArray(): array
    {
        $item = [
            'Name'      => $this->name,
            'Price'     => $this->price,
            'Quantity'  => $this->quantity,
            'Amount'    => $this->amount,
            'Tax'       => $this->tax,
        ];

        if (!empty($this->ean13)) {
            $item['Ean13'] = $this->ean13;
        }

        if (!empty($this->shopCode)) {
            $item['ShopCode'] = $this->shopCode;
        }

        return $item;
    }

}