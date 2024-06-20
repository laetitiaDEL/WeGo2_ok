<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240618201747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing ADD activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE outing ADD CONSTRAINT FK_F2A1062581C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_F2A1062581C06096 ON outing (activity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing DROP FOREIGN KEY FK_F2A1062581C06096');
        $this->addSql('DROP INDEX IDX_F2A1062581C06096 ON outing');
        $this->addSql('ALTER TABLE outing DROP activity_id');
    }
}
