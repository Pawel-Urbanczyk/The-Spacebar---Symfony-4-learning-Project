<?php


namespace App\Form\Model;


use App\Validator\UniqueUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


class UserRegistrationFormModel
{

    /**
     * @Assert\NotBlank(message="Please enter an email!")
     * @Assert\Email()
     * @UniqueUser(message="I think you've already registerd!")
     */
    public $email;

    /**
     * @Assert\NotBlank(message="Choose a password")
     * @Assert\Length(min=5, minMessage="Come on, you can think of a password longer than that...")
     */
    public $plainPassword;

    /**
     * @Assert\IsTrue(message="I know it' silly, but you must agree with terms")
     */
    public $agreeTerms;


}