<?php


namespace Naturhouse\Entities;


class Contact extends BaseEntity
{

    /**
     * https://naturhouseapiv2.docs.apiary.io/#reference/0/contact/create-new-contact
     */
    public const SEX_MALE = 0;
    public const SEX_FEMALE = 1;
    public const SEX_KID = 2;
    public const STATE_NEW = 'new';
    public const STATE_VALID = 'valid';
    public const STATE_DISCARD = 'discard';
    public const STATE_BUSSY = 'bussy';
    public const STATE_REFUND_REQUEST = 'refund_request';
    public const STATE_REFUND = 'refund';
    public const STATE_STORNO = 'storno';


    /**
     * @var int|null
     */
    protected $id = null;
    /**
     * @var string
     * @required
     * first name
     */
    protected $fname;
    /**
     * @var string
     * @required
     * last name
     */
    protected $lname;
    /**
     * @var string
     * @required
     * phone +420XXXXXXXXX
     */
    protected $phone;
    /**
     * @var string
     * email
     */
    protected $email;
    /**
     * @var string
     */
    protected $state = self::STATE_NEW;
    /**
     * @var int
     * @required
     * branch ID from list of branches, branch has to be active!
     * if your API token supports insert without branch, branch ID is not required
     */
    protected $branch;
    /**
     * @var Package[]
     */
    protected $packages;
    /**
     * @var string
     */
    protected $zip;
    /**
     * @var int
     * call time ID
     */
    protected $callTime;
    /**
     * @var int
     * source ID, if your token doesn't support setting source ID, it will be overwritten by API
     * source ID should be set based on information from Naturhouse
     */
    protected $source = 3;
    /**
     * @var int
     * phone number existence verification flag, should be 1 if phone was verified by SMS
     * 0 ... not verified contact
     * 1 ... verified contact
     */
    protected $verified = 0;
    /**
     * @var string
     */
    protected $interest;
    /**
     * @var int
     * 0 ... male
     * 1 ... female
     * 2 ... kid
     */
    protected $sex = self::SEX_MALE;
    /**
     * @var int
     * year of bird
     */
    protected $yob;
    /**
     * @var float
     * client weight in [kg]
     */
    protected $weight;
    /**
     * @var float
     * target weight in [kg]
     */
    protected $targetWeight;
    /**
     * @var int
     * client height in [cm]
     */
    protected $height;
    /**
     * @var string
     */
    protected $job;
    /**
     * @var string
     * health description
     */
    protected $health;
    /**
     * @var string
     * description of physical activities of client
     */
    protected $activities;
    /**
     * @var string
     */
    protected $utmMedium;
    /**
     * @var string
     */
    protected $utmContent;
    /**
     * @var string
     */
    protected $utmTerm;
    /**
     * @var string
     */
    protected $utmCampaign;
    /**
     * @var string
     * custom note - this note is displayed to operator, when during order call with client
     */
    protected $note;

    /**
     * Branch constructor.
     * @param array|null
     */
    public function __construct($data = null)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $method = str_replace('_', '', 'set' . ucwords($key, '_'));
                if (method_exists($this, $method)) {
                    $this->$method($val);
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param int $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return Package[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @param Package[] $packages
     */
    public function setPackages($packages)
    {
        $this->packages = $packages;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return int
     */
    public function getCallTime()
    {
        return $this->callTime;
    }

    /**
     * @param int $callTime
     */
    public function setCallTime($callTime)
    {
        $this->callTime = $callTime;
    }

    /**
     * @return int
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param int $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return int
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * @param int $verified
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;
    }

    /**
     * @return string
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @param string $interest
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;
    }

    /**
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return int
     */
    public function getYob()
    {
        return $this->yob;
    }

    /**
     * @param int $yob
     */
    public function setYob($yob)
    {
        $this->yob = $yob;
    }

    /**
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getTargetWeight()
    {
        return $this->targetWeight;
    }

    /**
     * @param float $targetWeight
     */
    public function setTargetWeight($targetWeight)
    {
        $this->targetWeight = $targetWeight;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param string $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return string
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @param string $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    }

    /**
     * @return string
     */
    public function getUtmMedium()
    {
        return $this->utmMedium;
    }

    /**
     * @param string $utmMedium
     */
    public function setUtmMedium($utmMedium)
    {
        $this->utmMedium = $utmMedium;
    }

    /**
     * @return string
     */
    public function getUtmContent()
    {
        return $this->utmContent;
    }

    /**
     * @param string $utmContent
     */
    public function setUtmContent($utmContent)
    {
        $this->utmContent = $utmContent;
    }

    /**
     * @return string
     */
    public function getUtmTerm()
    {
        return $this->utmTerm;
    }

    /**
     * @param string $utmTerm
     */
    public function setUtmTerm($utmTerm)
    {
        $this->utmTerm = $utmTerm;
    }

    /**
     * @return string
     */
    public function getUtmCampaign()
    {
        return $this->utmCampaign;
    }

    /**
     * @param string $utmCampaign
     */
    public function setUtmCampaign($utmCampaign)
    {
        $this->utmCampaign = $utmCampaign;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


}