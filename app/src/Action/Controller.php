<?php
/**
 * Created by PhpStorm.
 * User: leetspeakv2
 * Date: 25/12/16
 * Time: 22:21
 */

namespace App\Action;

use App\Data\Database;
use App\File\FileManager;
use App\Security\Crypter;
use Slim\Views\Twig;
use Psr\Log\LoggerInterface;


class Controller
{
    protected $view;
    protected $logger;
    protected $pdo;
    protected $files;
    protected $crypter;

    public function __construct(Twig $view, LoggerInterface $logger, Database $pdo, FileManager $files, Crypter $crypter)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->pdo = $pdo;
        $this->files = $files;
        $this->crypter = $crypter;
    }
}