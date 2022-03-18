<?php

namespace App\Service;

use App\Service\SvgGenerator;
use App\Entity\Lockups;
use App\Entity\LockupsFields;
use App\Entity\LockupTemplates;
use Doctrine\Persistence\ManagerRegistry;

class LockupsGenerator
{
    private $SvgGenerator;
    private $doctrine;

    public function __construct(SvgGenerator $SvgGenerator, ManagerRegistry $doctrine)
    {
        $this->SvgGenerator = $SvgGenerator;
        $this->doctrine = $doctrine;
    }

    public function fetchLockupDetails(int $id): ?array
    {
        $array = array(
            "fields" => "",
            "h" => null,
            "v" => null
        );

        $lockup = $this->doctrine->getRepository(Lockups::class)->find($id);
        if ($lockup->getTemplate()->getStyle() == "h") {
            $array["h"] = $lockup->getTemplate();
        } else {
            $array["v"] = $lockup->getTemplate();
        }

        if ($lockup->getTemplate()->getLinksTo() != null) {
            $lockupTemplate = $this->doctrine->getRepository(LockupTemplates::class)->find($lockup->getTemplate()->getLinksTo());

            if ($lockupTemplate->getStyle() == "h") {
                $array["h"] = $lockupTemplate;
            } else {
                $array["v"] = $lockupTemplate;
            }
        }

        $lockupFields = $this->doctrine->getRepository(LockupsFields::class)->findBy(['lockup' => $id]);
        $array["fields"] = $lockupFields;

        return $array;
    }


    public function createPreview(int $id): string
    {
        $lockups = $this->doctrine->getRepository(Lockups::class)->find($id);
        $array = $this->fetchLockupDetails($id);
        if ($array["h"] != null)
        {
            $horizontal = $this->SvgGenerator->createLockup($array["h"]->getSlug(), $array['fields'], 'h', 'RGB', false, true);
            $lockups->setPreviewH($horizontal);
        }
        if ($array["v"] != null)
        {
            $vertical = $this->SvgGenerator->createLockup($array["v"]->getSlug(), $array['fields'], 'v', 'RGB', false, true);
            $lockups->setPreviewV($vertical);
        }
        $this->doctrine->getManager()->persist($lockups);
        $this->doctrine->getManager()->flush();
        return "";
    }
}
