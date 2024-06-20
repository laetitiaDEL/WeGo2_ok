<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240618201528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outing (id INT AUTO_INCREMENT NOT NULL, creator_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, INDEX IDX_F2A1062561220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outing_user (outing_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2CCED92AF4C7531 (outing_id), INDEX IDX_2CCED92A76ED395 (user_id), PRIMARY KEY(outing_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outing_pet (outing_id INT NOT NULL, pet_id INT NOT NULL, INDEX IDX_DEF7BF59AF4C7531 (outing_id), INDEX IDX_DEF7BF59966F7FB6 (pet_id), PRIMARY KEY(outing_id, pet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE outing ADD CONSTRAINT FK_F2A1062561220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE outing_user ADD CONSTRAINT FK_2CCED92AF4C7531 FOREIGN KEY (outing_id) REFERENCES outing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outing_user ADD CONSTRAINT FK_2CCED92A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outing_pet ADD CONSTRAINT FK_DEF7BF59AF4C7531 FOREIGN KEY (outing_id) REFERENCES outing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outing_pet ADD CONSTRAINT FK_DEF7BF59966F7FB6 FOREIGN KEY (pet_id) REFERENCES pet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing DROP FOREIGN KEY FK_F2A1062561220EA6');
        $this->addSql('ALTER TABLE outing_user DROP FOREIGN KEY FK_2CCED92AF4C7531');
        $this->addSql('ALTER TABLE outing_user DROP FOREIGN KEY FK_2CCED92A76ED395');
        $this->addSql('ALTER TABLE outing_pet DROP FOREIGN KEY FK_DEF7BF59AF4C7531');
        $this->addSql('ALTER TABLE outing_pet DROP FOREIGN KEY FK_DEF7BF59966F7FB6');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE outing');
        $this->addSql('DROP TABLE outing_user');
        $this->addSql('DROP TABLE outing_pet');
    }
}
