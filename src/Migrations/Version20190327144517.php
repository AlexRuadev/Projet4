<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327144517 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE enfant');
        $this->addSql('CREATE TEMPORARY TABLE __temp__parents AS SELECT id, parents_pseudo, parents_mail, parents_mdp, parents_token, parents_status, parents_prenom, parents_nom, parents_adresse, parents_telephone, parents_cp, parents_ville, parents_created_at, parents_updated_at, parents_role FROM parents');
        $this->addSql('DROP TABLE parents');
        $this->addSql('CREATE TABLE parents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parents_pseudo VARCHAR(45) NOT NULL COLLATE BINARY, parents_token VARCHAR(255) NOT NULL COLLATE BINARY, parents_status BOOLEAN NOT NULL, parents_prenom VARCHAR(45) DEFAULT NULL COLLATE BINARY, parents_nom VARCHAR(45) DEFAULT NULL COLLATE BINARY, parents_adresse VARCHAR(255) DEFAULT NULL COLLATE BINARY, parents_telephone VARCHAR(13) DEFAULT NULL COLLATE BINARY, parents_cp INTEGER DEFAULT NULL, parents_role CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , parents_date_creation DATETIME NOT NULL, parents_date_modif DATETIME DEFAULT NULL, parents_mail VARCHAR(255) NOT NULL, parents_mdp VARCHAR(255) NOT NULL, parents_ville VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO parents (id, parents_pseudo, parents_mail, parents_mdp, parents_token, parents_status, parents_prenom, parents_nom, parents_adresse, parents_telephone, parents_cp, parents_ville, parents_date_creation, parents_date_modif, parents_role) SELECT id, parents_pseudo, parents_mail, parents_mdp, parents_token, parents_status, parents_prenom, parents_nom, parents_adresse, parents_telephone, parents_cp, parents_ville, parents_created_at, parents_updated_at, parents_role FROM __temp__parents');
        $this->addSql('DROP TABLE __temp__parents');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE enfant (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfant_parents_id INTEGER DEFAULT NULL, enfant_prenom VARCHAR(45) NOT NULL COLLATE BINARY, enfant_nom VARCHAR(45) NOT NULL COLLATE BINARY, enfant_status BOOLEAN NOT NULL, enfant_created_at DATETIME NOT NULL, enfant_updated_at DATETIME DEFAULT NULL, enfant_date_de_naissance DATE NOT NULL, enfant_information CLOB NOT NULL COLLATE BINARY)');
        $this->addSql('CREATE INDEX IDX_34B70CA24AE2557F ON enfant (enfant_parents_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__parents AS SELECT id, parents_pseudo, parents_mail, parents_mdp, parents_token, parents_role, parents_prenom, parents_nom, parents_adresse, parents_telephone, parents_cp, parents_ville, parents_status, parents_date_creation, parents_date_modif FROM parents');
        $this->addSql('DROP TABLE parents');
        $this->addSql('CREATE TABLE parents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parents_pseudo VARCHAR(45) NOT NULL, parents_token VARCHAR(255) NOT NULL, parents_role CLOB NOT NULL --(DC2Type:array)
        , parents_prenom VARCHAR(45) DEFAULT NULL, parents_nom VARCHAR(45) DEFAULT NULL, parents_adresse VARCHAR(255) DEFAULT NULL, parents_telephone VARCHAR(13) DEFAULT NULL, parents_cp INTEGER DEFAULT NULL, parents_status BOOLEAN NOT NULL, parents_created_at DATETIME NOT NULL, parents_updated_at DATETIME DEFAULT NULL, parents_mail VARCHAR(100) NOT NULL COLLATE BINARY, parents_mdp VARCHAR(45) NOT NULL COLLATE BINARY, parents_ville VARCHAR(45) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO parents (id, parents_pseudo, parents_mail, parents_mdp, parents_token, parents_role, parents_prenom, parents_nom, parents_adresse, parents_telephone, parents_cp, parents_ville, parents_status, parents_created_at, parents_updated_at) SELECT id, parents_pseudo, parents_mail, parents_mdp, parents_token, parents_role, parents_prenom, parents_nom, parents_adresse, parents_telephone, parents_cp, parents_ville, parents_status, parents_date_creation, parents_date_modif FROM __temp__parents');
        $this->addSql('DROP TABLE __temp__parents');
    }
}
