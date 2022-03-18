<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220316202111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockups ADD user_id INT DEFAULT NULL, DROP user');
        $this->addSql('ALTER TABLE lockups ADD CONSTRAINT FK_AE64CA34A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_AE64CA34A76ED395 ON lockups (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lockups DROP FOREIGN KEY FK_AE64CA34A76ED395');
        $this->addSql('DROP INDEX IDX_AE64CA34A76ED395 ON lockups');
        $this->addSql('ALTER TABLE lockups ADD user INT NOT NULL, DROP user_id');
    }
}
