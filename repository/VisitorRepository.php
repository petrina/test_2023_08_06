<?php
require_once 'classes/Repository.php';

class VisitorRepository extends Repository
{
    protected $table = 'visitors';

    public function exist(string $userAgent, string $ip, ?string $pageUrl){
        $statement = $this->mysql->query('SELECT count(id) count_rows FROM '.$this->table.' WHERE user_agent = ? AND ip_address = ? and page_url = ?', [
            $userAgent, $ip, $pageUrl
        ]);
        return $statement->fetch()['count_rows'] > 0;
    }

    public function incrementView(string $userAgent, string $ip, string $pageUrl) {
        $sql = 'UPDATE '.$this->table.' SET view_date = ?, views_count = views_count + 1 WHERE user_agent = ? AND ip_address = ? and page_url = ?';
        $this->mysql->query($sql, [
            date('Y-m-d H:i:s'),
            $userAgent,
            $ip,
            $pageUrl
        ]);
    }
}