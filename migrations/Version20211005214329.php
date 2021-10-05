<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005214329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_role (user_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_2DE8C6A3A76ED395 (user_id), INDEX IDX_2DE8C6A3D60322AC (role_id), PRIMARY KEY(user_id, role_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_role ADD CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C67B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_9474526C67B3B43D ON comment (users_id)');
        $this->addSql('ALTER TABLE home ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE home ADD CONSTRAINT FK_71D60CD067B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_71D60CD067B3B43D ON home (users_id)');
        $this->addSql('ALTER TABLE restaurant ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F67B3B43D FOREIGN KEY (users_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_EB95123F67B3B43D ON restaurant (users_id)');
        $this->addSql('ALTER TABLE role ADD admins_id INT NOT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AFAA286C3 FOREIGN KEY (admins_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_57698A6AFAA286C3 ON role (admins_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C67B3B43D');
        $this->addSql('DROP INDEX IDX_9474526C67B3B43D ON comment');
        $this->addSql('ALTER TABLE comment DROP users_id');
        $this->addSql('ALTER TABLE home DROP FOREIGN KEY FK_71D60CD067B3B43D');
        $this->addSql('DROP INDEX IDX_71D60CD067B3B43D ON home');
        $this->addSql('ALTER TABLE home DROP users_id');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F67B3B43D');
        $this->addSql('DROP INDEX IDX_EB95123F67B3B43D ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP users_id');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AFAA286C3');
        $this->addSql('DROP INDEX IDX_57698A6AFAA286C3 ON role');
        $this->addSql('ALTER TABLE role DROP admins_id');
    }
}
