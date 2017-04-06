<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Services;

/**
 * Class DBConnexion
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class DBConnexion
{
    /** @var string */
    private $db_host;

    /** @var string */
    private $db_name;

    /** @var string */
    private $db_user_name;

    /** @var string */
    private $db_user_password;

    /**
     * DBConnexion constructor.
     *
     * @param string $db_host
     * @param string $db_name
     * @param string $db_user_name
     * @param string $db_user_password
     */
    public function __construct (
        $db_host,
        $db_name,
        $db_user_name,
        $db_user_password
    ) {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user_name = $db_user_name;
        $this->db_user_password = $db_user_password;
    }

    /**
     * @return \PDO
     */
    public function connect()
    {
        try {
            return new \PDO(
                'pgsql:host:'.$this->db_host.';dbname=' . $this->db_name .';charset=UTF8',
                $this->db_user_name,
                $this->db_user_password
            );
        } catch (\Exception $exception) {
            $exception->getMessage();
        }
    }

    /**
     * @param string $query
     *
     * @return \PDOStatement
     */
    public function buildQuery(string $query)
    {
        $db = $this->connect();

       return $db->query($query);
    }
}