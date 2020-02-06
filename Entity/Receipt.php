<?php


namespace Xpat\TinkoffBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Receipt
{

    const TAXATION_OSN = "osn"; // общая
    const TAXATION_USN_INCOME  = "usn_income"; //  — упрощенная (доходы)
    const TAXATION_USN_INCOME_OUTCOME  = "usn_income_outcome"; // — упрощенная (доходы минус расходы)
    const TAXATION_PATENT  = "patent"; //   — патентная
    const TAXATION_ENVD  = "envd"; //   — единый налог на вмененный доход
    const TAXATION_ESN  = "esn"; //    — единый сельскохозяйственный налог

    /**
     * Email	Электронная почта покупателя
     * 	required - Нет, если передан параметр Phone
     * @var string|null
     */
    protected $email;

    /**
     * Phone	Телефон покупателя
     * 	required - Нет, если передан параметр Email
     * @var string|null
     */
    protected $phone;

    /**
     * EmailCompany	Электронная почта продавца
     * 	optional
     * @var string|null
     */
    protected $emailCompany;

    /**
     * Taxation	Система налогообложения:
     * osn — общая
     * usn_income — упрощенная (доходы)
     * usn_income_outcome — упрощенная (доходы минус расходы)
     * patent — патентная
     * envd — единый налог на вмененный доход
     * esn — единый сельскохозяйственный налог
     * 	required
     * @var string|null
     */
    protected $taxation;

    /**
     * Items	Массив позиций чека с информацией о товарах. См. Структура объекта Items	object	Да
     * @var  ArrayCollection|Item[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getEmailCompany(): ?string
    {
        return $this->emailCompany;
    }

    /**
     * @param string|null $emailCompany
     */
    public function setEmailCompany(?string $emailCompany): void
    {
        $this->emailCompany = $emailCompany;
    }

    /**
     * @return string|null
     */
    public function getTaxation(): ?string
    {
        return $this->taxation;
    }

    /**
     * @param string|null $taxation
     */
    public function setTaxation(?string $taxation): void
    {
        $this->taxation = $taxation;
    }

    /**
     * @return ArrayCollection|Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item): void
    {
        $this->items->add($item);
    }

    /**
     * @param Item $item
     */
    public function removeItem(Item $item): void
    {
        $this->items->removeElement($item);
    }

    public function __toArray()
    {
        $receipt = [
            'Items'     => [],
            'Email'     => $this->email,
            'Taxation'  => $this->taxation,
        ];

        if (!empty($this->phone)) {
            $receipt['Phone'] = $this->phone;
        }

        /** @var Item $item */
        foreach ($this->items as $item) {
            $receipt['Items'][] = $item->__toArray();
        }

        return $receipt;
    }
}