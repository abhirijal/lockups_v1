<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309193941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockups ADD CONSTRAINT FK_AE64CA345DA0FB8 FOREIGN KEY (template_id) REFERENCES lockup_templates (id)');
        $this->addSql('CREATE INDEX IDX_AE64CA345DA0FB8 ON lockups (template_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockups DROP FOREIGN KEY FK_AE64CA345DA0FB8');
        $this->addSql('DROP INDEX IDX_AE64CA345DA0FB8 ON lockups');
    }
}
