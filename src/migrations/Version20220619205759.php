<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220619205759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attraction ADD creator_user VARCHAR(255) DEFAULT NULL, ADD updater_user VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE hotel ADD creator_user VARCHAR(255) DEFAULT NULL, ADD updater_user VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD creator_user VARCHAR(255) DEFAULT NULL, ADD updater_user VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD creator_user VARCHAR(255) DEFAULT NULL, ADD updater_user VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attraction DROP creator_user, DROP updater_user');
        $this->addSql('ALTER TABLE hotel DROP creator_user, DROP updater_user');
        $this->addSql('ALTER TABLE message DROP creator_user, DROP updater_user');
        $this->addSql('ALTER TABLE room DROP creator_user, DROP updater_user');
    }
}
