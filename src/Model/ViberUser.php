<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:00 PM.
 */

namespace Paragraf\ViberBot\Model;

class ViberUser
{
    public $id;

    public $name;

    public $country;

    public $language;

    public $api_version;

    /**
     * ViberUser constructor.
     * @param $id
     * @param $name
     * @param $avatar
     * @param $country
     * @param $language
     * @param $api_version
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    public function getApiVersion()
    {
        return $this->api_version;
    }

    public function setApiVersion($api_version)
    {
        $this->api_version = $api_version;

        return $this;
    }
}
