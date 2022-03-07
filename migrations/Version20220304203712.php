<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304203712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE lockup_templates_fields_map');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lockup_templates_fields_map (id INT AUTO_INCREMENT NOT NULL, lockup_template_id_id INT DEFAULT NULL, lockups_fields_id_id INT DEFAULT NULL, INDEX IDX_3BC263279C3F05EE (lockup_template_id_id), INDEX IDX_3BC26327A7B1A798 (lockups_fields_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE lockup_templates_fields_map ADD CONSTRAINT FK_3BC263279C3F05EE FOREIGN KEY (lockup_template_id_id) REFERENCES lockup_templates (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lockup_templates_fields_map ADD CONSTRAINT FK_3BC26327A7B1A798 FOREIGN KEY (lockups_fields_id_id) REFERENCES lockup_templates_fields (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE lockup_templates CHANGE name name VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE style style VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE svg svg LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lockup_templates_fields CHANGE type type VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE placeholder placeholder VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE value value VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE lockups CHANGE org_first_line org_first_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE org_second_line org_second_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE subject_first_line subject_first_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE subject_second_line subject_second_line VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
