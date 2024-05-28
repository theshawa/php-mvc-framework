<?php

namespace src;

use app\core\model\DbModel;
use Exception;
use src\models\User;

require_once __DIR__ . "/routes.php";

class Application extends \core\Application
{
    public ?DbModel $user = null;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct([
            'rootDir' => __DIR__,
            'defaultLayout' => 'main',
            'database' => $GLOBALS['database_config'],
            'errorView' => '_error'
        ]);
        $this->_initUser();
        $this->_initRoutes();
    }

    private function _initRoutes(): void
    {
        $router = $this->router;
        initRoutes($router);
    }

    /**
     * @throws Exception
     */
    private function _initUser(): void
    {
        if (!$this->db) return;
        $userId = $this->session->get('user');
        if ($userId) {
            $primaryKey = User::primaryKey();
            $result = User::findOne([$primaryKey => $userId], User::class);
            if ($result) {
                $this->user = $result;
            }
        }
    }

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    public function login(DbModel $user): bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout(): void
    {
        $this->user = null;
        $this->session->remove('user');
    }
}