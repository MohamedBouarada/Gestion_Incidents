<?php


class personne
{
    private $nom;
    private $prénom;
    private $phone;

    /**
     * personne constructor.
     * @param $nom
     * @param $prénom
     * @param $phone
     */
    public function __construct($nom, $prénom, $phone)
    {
        $this->nom = $nom;
        $this->prénom = $prénom;
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrénom()
    {
        return $this->prénom;
    }

    /**
     * @param mixed $prénom
     */
    public function setPrénom($prénom): void
    {
        $this->prénom = $prénom;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * personne constructor.
     * @param $nom
     * @param $prénom
     * @param $phone
     */

    function whoAmI() {
        echo "Je suis ". $this->firstname. " ". $this->name;
    }

    public function __toString()
    {
        return "Je suis ". $this->firstname. " ". $this->name;
    }

}