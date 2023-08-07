<?php

class Repository{

    protected $table = '';
    protected $mysql = null;

    public function __construct(Mysql $mysql) {
        $this->mysql = $mysql;
    }

    public function create(array $data) {
        $this->mysql->insert($this->table, $data);
    }
}