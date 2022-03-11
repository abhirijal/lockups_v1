<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309191905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockups DROP org_first_line, DROP org_second_line, DROP subject_first_line, DROP subject_second_line');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockups ADD org_first_line VARCHAR(50) DEFAULT NULL, ADD org_second_line VARCHAR(50) DEFAULT NULL, ADD subject_first_line VARCHAR(50) DEFAULT NULL, ADD subject_second_line VARCHAR(50) DEFAULT NULL');
    }
}
