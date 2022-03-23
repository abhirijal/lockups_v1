<?php

namespace App\Service;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\KernelInterface;


class LockupsConverter
{
    private $doctrine;
    private $appKernel;
    private $projectRoot;

    public function __construct(ManagerRegistry $doctrine, KernelInterface $appKernel)
    {
        $this->doctrine = $doctrine;
        $this->appKernel = $appKernel;
        $this->projectRoot = $this->appKernel->getProjectDir();
    }

    public function convertAll() : bool
    {
        return true;
    }
}
