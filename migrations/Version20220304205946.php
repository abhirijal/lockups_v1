<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304205946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lockup_templates_categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, slug VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lockup_templates ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lockup_templates ADD CONSTRAINT FK_FE1D4C9912469DE2 FOREIGN KEY (category_id) REFERENCES lockup_templates_categories (id)');
        $this->addSql('CREATE INDEX IDX_FE1D4C9912469DE2 ON lockup_templates (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockup_templates DROP FOREIGN KEY FK_FE1D4C9912469DE2');
        $this->addSql('DROP TABLE lockup_templates_categories');
        $this->addSql('DROP INDEX IDX_FE1D4C9912469DE2 ON lockup_templates');
        $this->addSql('ALTER TABLE lockup_templates DROP category_id, CHANGE name name VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE style style VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE svg svg LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lockup_templates_fields CHANGE type type VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE placeholder placeholder VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE value value VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lockups CHANGE org_first_line org_first_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE org_second_line org_second_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE subject_first_line subject_first_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE subject_second_line subject_second_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
