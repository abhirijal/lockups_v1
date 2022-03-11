<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309192628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lockups_fields (id INT AUTO_INCREMENT NOT NULL, lockup_id INT DEFAULT NULL, fields_id INT DEFAULT NULL, value VARCHAR(100) DEFAULT NULL, INDEX IDX_AA8F07234EF5AEE9 (lockup_id), INDEX IDX_AA8F07232C5439AE (fields_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lockups_fields ADD CONSTRAINT FK_AA8F07234EF5AEE9 FOREIGN KEY (lockup_id) REFERENCES lockups (id)');
        $this->addSql('ALTER TABLE lockups_fields ADD CONSTRAINT FK_AA8F07232C5439AE FOREIGN KEY (fields_id) REFERENCES lockup_templates_fields (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lockups_fields');
    }
}
