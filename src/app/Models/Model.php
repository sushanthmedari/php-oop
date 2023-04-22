<?php

namespace Models;

use PDO;
use Database\DBConnection;

abstract class Model
{

    private $db;
    private $table = "products";

    public function __construct(DBConnection $db = null)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table}");
    }


    public function destroy($ids): bool
    {
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }
        $ids = array_map('intval', $ids);
     
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
 
        return $this->query("DELETE FROM {$this->table} WHERE id IN ($placeholders)", $ids);
    }


    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'INSERT') === 0
        ) {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }
}
