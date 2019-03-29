<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327145835 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE enfants (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfants_parents_id INTEGER DEFAULT NULL, enfants_prenom VARCHAR(45) NOT NULL, enfants_nom VARCHAR(45) NOT NULL, enfants_date_de_naissance DATE NOT NULL, enfants_information CLOB DEFAULT NULL, enfants_status BOOLEAN NOT NULL, enfants_date_creation DATETIME NOT NULL, enfants_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_23E2BAC316EBDBF2 ON enfants (enfants_parents_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE enfants');
    }
}
