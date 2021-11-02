<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211102210920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FA76ED395');
        $this->addSql('DROP INDEX IDX_EB95123FA76ED395 ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP user_id');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BA76ED395');
        $this->addSql('DROP INDEX IDX_729F519BA76ED395 ON room');
        $this->addSql('ALTER TABLE room CHANGE user_id author_id INT NOT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_729F519BF675F31B ON room (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FA76ED395 ON restaurant (user_id)');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BF675F31B');
        $this->addSql('DROP INDEX IDX_729F519BF675F31B ON room');
        $this->addSql('ALTER TABLE room CHANGE author_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_729F519BA76ED395 ON room (user_id)');
    }
}
