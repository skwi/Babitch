<?php

namespace Cytron\Bundle\BabitchBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use FSC\HateoasBundle\Annotation as Hateoas;
use JMS\Serializer\Annotation as Serializer;

/**
 * Babitch League Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="league")
 * @Hateoas\Relation("self", href = @Hateoas\Route("get_player", parameters = { "id" = ".id"}))
 */
class League extends AbstractEntity
{
    const GAMELLE_RULE_NONE   = 'none';
    const GAMELLE_RULE_SINGLE = 'single';
    const GAMELLE_RULE_BOTH   = 'both';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     *
     * @var integer
     */
    protected $id;

     /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="league")
     * @Serializer\Exclude()
     *
     * @var ArrayCollection
     */
    protected $games;

    /**
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(name="gamelle_rule", type="string", nullable=true)
     *
     * @var string
     */
    protected $gamelleRule;

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set gamelleRule
     *
     * @param string $gamelleRule
     */
    public function setGamelleRule($gamelleRule = self::GAMELLE_RULE_NONE)
    {
        $this->gamelleRule = $gamelleRule;
    }

    /**
     * Get gamelleRule
     *
     * @return  string
     */
    public function getGamelleRule()
    {
        return $this->gamelleRule;
    }

    /**
     * @return array
     */
    public static function getAllowedGamelleRules()
    {
        return array(
            self::GAMELLE_RULE_NONE   => self::GAMELLE_RULE_NONE,
            self::GAMELLE_RULE_SINGLE => self::GAMELLE_RULE_SINGLE,
            self::GAMELLE_RULE_BOTH   => self::GAMELLE_RULE_BOTH,
        );
    }
}
