<?php


namespace App\Model\Search;


class CardSearch
{
    /**
     * @var ?string
     */
    private $set='';

    /**
     * @var ?string
     */
    private $name='';

    /**
     * @var ?string
     */
    private $type='';

    /**
     * @return string|null
     */
    public function getSet(): ?string
    {
        return $this->set;
    }

    /**
     * @param string|null $set
     * @return CardSearch
     */
    public function setSet(?string $set): CardSearch
    {
        $this->set = $set;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return CardSearch
     */
    public function setName(?string $name): CardSearch
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return CardSearch
     */
    public function setType(?string $type): CardSearch
    {
        $this->type = $type;
        return $this;
    }



}