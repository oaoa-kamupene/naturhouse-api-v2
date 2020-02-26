<?php


namespace Naturhouse\Entities;


class Branch extends BaseEntity
{
    /**
     *   https://naturhouseapiv2.docs.apiary.io/#reference/0/branches/list-of-branches
     *
     * @examples
     *   id    72
     *   new_contract    1
     *   sections    1
     *   region    "Středočeský kraj"
     *   name    "Benešov"
     *   person    "Soňa Karafiátová"
     *   company_name    "NATURHOUSE - Benešov"
     *   email    "benesov@naturhouse-cz.cz"
     *   phone    "725 425 192"
     *   active    0
     *   full    0
     *   city    "Benešov"
     *   street    "Tyršova 175"
     *   zip    25601
     *   color    "#78D958"
     *   lat    49.7837821
     *   lon    14.6873698
     */

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     * internal flag
     */
    private $newContract;
    /**
     * @var int
     * branch can be dividet to sections (if there are multiple dietologist available
     * branches with multiple sections has number of calendars equal to number of sections - it is possible to
     * order multiple clients to same time
     */
    private $sections;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $person;
    /**
     * @var string
     */
    private $companyName;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $phone;
    /**
     * @var int
     * activity of branch is defined in CRM
     * activity is also affected by branch credit amount
     */
    private $active;
    /**
     * @var int
     * flag indicates that branch is fully occupied and doesn't accept new clients
     */
    private $full;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $street;
    /**
     * @var string
     */
    private $zip;
    /**
     * @var float
     * GPS latitude
     */
    private $lat;
    /**
     * @var float
     * GPS longitude
     */
    private $lon;

    /**
     * Branch constructor.
     * @param array
     */
    public function __construct($data)
    {
        foreach ($data as $key => $val) {
            $method = str_replace('_', '', 'set' . ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($val);
            }
        }
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $newContract
     */
    public function setNewContract($newContract)
    {
        $this->newContract = $newContract;
    }

    /**
     * @param int $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param int $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @param int $full
     */
    public function setFull($full)
    {
        $this->full = $full;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @param float $lon
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNewContract()
    {
        return $this->newContract;
    }

    /**
     * @return int
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return int
     */
    public function getFull()
    {
        return $this->full;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }


}