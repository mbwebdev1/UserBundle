<?php

namespace RtxLabs\UserBundle\Model;

interface AdvancedUserInterface extends \Symfony\Component\Security\Core\User\AdvancedUserInterface
{
    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username);

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password);

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname);

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname);

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email);

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail();

    /**
     * @abstract
     * @param boolean $required
     * @return void
     */
    public function setPasswordRequired($required);

    /**
     * @abstract
     * @return mixed
     */
    public function getPasswordRequired();

    /**
     * Set roles
     *
     * @param array $roles
     */
    public function setRoles($roles);

    /**
     * Adds a role to the user.
     *
     * @param string $role
     */
    public function addRole($role);

    /**
     * @param string $rolename
     * @return boolean
     */
    public function hasRole($rolename);

    /**
     * Removes a role to the user.
     *
     * @param string $role
     */
    public function removeRole($role);

    /**
     * Set locale
     *
     * @param string $locale
     */
    public function setLocale($locale);

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale();

    /**
     * Set lastLogin
     *
     * @param datetime $lastLogin
     */
    public function setLastLogin($lastLogin);

    /**
     * Get lastLogin
     *
     * @return datetime
     */
    public function getLastLogin();

    /**
     * Set deletedAt
     *
     * @param datetime $deletedAt
     */
    public function setDeletedAt($deletedAt);

    /**
     * Get deletedAt
     *
     * @return datetime
     */
    public function getDeletedAt();

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt);

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt);

    /**
     * Get createdAt
     *
     * @return datetime
     */
    public function getCreatedAt();

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get updatedAt
     *
     * @return datetime
     */
    public function getUpdatedAt();

    /**
     * @return boolean
     */
    public function isAdmin();

    public function setAdmin($value);

    /**
     * Add groups
     *
     * @param RtxLabs\UserBundle\Entity\Group $groups
     */
    public function addGroups(\RtxLabs\UserBundle\Entity\Group $groups);

    /**
     * Get groups
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getGroups();

    /**
     * Gets the name of the groups which includes the user.
     *
     * @return array
     */
    public function getGroupNames();

    /**
     * Set passwordToken
     *
     * @param string $passwordToken
     */
    public function setPasswordToken($passwordToken);

    /**
     * Get passwordToken
     *
     * @return string
     */
    public function getPasswordToken();

    /**
     * Get registrationToken
     *
     * @return string
     */
    public function getRegistrationToken();
    
    /**
     * Set registrationToken
     *
     * @param string $registrationToken
     */
    public function setRegistrationToken($registrationToken);

    public function getPlainPassword();

    public function setPlainPassword($plainPassword);

    public function addUserAttribute(UserAttributeInterface $attributes);

    public function getAttributes();
    
    public function isAccountNonExpired();

    public function isAccountNonLocked();

    public function isCredentialsNonExpired();

    public function isEnabled();
}
