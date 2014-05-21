<?php

namespace WebKate\Bundle\TestTaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Executor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WebKate\Bundle\TestTaskBundle\Entity\ExecutorRepository")
 */
class Executor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="secondName", type="string", length=255)
     */
    private $secondName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="patronymic", type="string", length=255)
     */
    private $patronymic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime")
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="careerBeggining", type="string", length=255)
     */
    private $careerBeggining;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="phoneNumber", type="integer")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="technologyUsed", type="string", length=255)
     */
    private $technologyUsed;

    /**
     * @ORM\ManyToMany(targetEntity="Project", inversedBy="executors")
     * @ORM\JoinTable(name="projects_executors")
     */
    private $projects;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set secondName
     *
     * @param string $secondName
     * @return Executor
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get secondName
     *
     * @return string
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Executor
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set patronymic
     *
     * @param string $patronymic
     * @return Executor
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Get patronymic
     *
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Executor
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set careerBeggining
     *
     * @param string $careerBeggining
     * @return Executor
     */
    public function setCareerBeggining($careerBeggining)
    {
        $this->careerBeggining = $careerBeggining;

        return $this;
    }

    /**
     * Get careerBeggining
     *
     * @return string
     */
    public function getCareerBeggining()
    {
        return $this->careerBeggining;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Executor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     * @return Executor
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Executor
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set technologyUsed
     *
     * @param string $technologyUsed
     * @return Executor
     */
    public function setTechnologyUsed($technologyUsed)
    {
        $this->technologyUsed = $technologyUsed;

        return $this;
    }

    /**
     * Get technologyГыUsed
     *
     * @return string
     */
    public function getTechnologyUsed()
    {
        return $this->technologyUsed;
    }

    /**
     * Set projects
     * @param \WebKateTestTaskBundle\Entity\Project
     * @return $this
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects()
    {
        return $this->projects;
    }


}
