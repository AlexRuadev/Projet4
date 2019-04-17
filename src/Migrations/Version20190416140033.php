<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190416140033 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, avis_parents_id INTEGER NOT NULL, avis_entreprises_id INTEGER NOT NULL, avis_note INTEGER DEFAULT NULL, avis_commentaires VARCHAR(255) DEFAULT NULL, avis_signalement INTEGER DEFAULT NULL, avis_status BOOLEAN NOT NULL, avis_date_creation DATETIME NOT NULL, avis_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_8F91ABF05BC311EA ON avis (avis_parents_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0E92F697A ON avis (avis_entreprises_id)');
        $this->addSql('CREATE TABLE bracelet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, bracelet_enfants_id INTEGER NOT NULL, bracelet_entreprises_id INTEGER NOT NULL, bracelet_status BOOLEAN NOT NULL, bracelet_date_creation DATETIME NOT NULL, bracelet_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93F6777DA30D5003 ON bracelet (bracelet_enfants_id)');
        $this->addSql('CREATE INDEX IDX_93F6777DAFB922E4 ON bracelet (bracelet_entreprises_id)');
        $this->addSql('CREATE TABLE disponibilite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, disponibilite_jour DATE NOT NULL, disponibilite_nb_enfant INTEGER NOT NULL, disponibilite_status BOOLEAN NOT NULL, disponibilite_date_creation DATETIME NOT NULL, disponibilite_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE disponibilite_reservations (disponibilite_id INTEGER NOT NULL, reservations_id INTEGER NOT NULL, PRIMARY KEY(disponibilite_id, reservations_id))');
        $this->addSql('CREATE INDEX IDX_9FC890072B9D6493 ON disponibilite_reservations (disponibilite_id)');
        $this->addSql('CREATE INDEX IDX_9FC89007D9A7F869 ON disponibilite_reservations (reservations_id)');
        $this->addSql('CREATE TABLE enfants (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfants_parents_id INTEGER DEFAULT NULL, enfants_prenom VARCHAR(45) NOT NULL, enfants_nom VARCHAR(45) NOT NULL, enfants_date_de_naissance DATE NOT NULL, enfants_information CLOB DEFAULT NULL, enfants_status BOOLEAN NOT NULL, enfants_date_creation DATETIME NOT NULL, enfants_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_23E2BAC316EBDBF2 ON enfants (enfants_parents_id)');
        $this->addSql('CREATE TABLE entreprises (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entreprises_pseudo VARCHAR(45) NOT NULL, entreprises_mail VARCHAR(255) NOT NULL, entreprises_mdp VARCHAR(255) NOT NULL, entreprises_token VARCHAR(255) NOT NULL, entreprises_role CLOB NOT NULL --(DC2Type:array)
        , entreprises_nom VARCHAR(45) DEFAULT NULL, entreprises_effectifs INTEGER DEFAULT NULL, entreprises_adresse VARCHAR(255) DEFAULT NULL, entreprises_cp INTEGER DEFAULT NULL, entreprises_ville VARCHAR(45) DEFAULT NULL, entreprises_telephone VARCHAR(13) DEFAULT NULL, entreprises_siret INTEGER DEFAULT NULL, entreprises_description CLOB DEFAULT NULL, entreprises_horaires CLOB DEFAULT NULL, entreprises_capacite INTEGER DEFAULT NULL, entreprises_note DOUBLE PRECISION DEFAULT NULL, entreprises_tarif CLOB DEFAULT NULL, entreprises_espace_exterieur BOOLEAN DEFAULT NULL, entreprises_status BOOLEAN NOT NULL, entreprises_date_creation DATETIME NOT NULL, entreprises_date_modif DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE parents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parents_pseudo VARCHAR(45) NOT NULL, parents_mail VARCHAR(255) NOT NULL, parents_mdp VARCHAR(255) NOT NULL, parents_token VARCHAR(255) NOT NULL, parents_role CLOB NOT NULL --(DC2Type:array)
        , parents_prenom VARCHAR(45) DEFAULT NULL, parents_nom VARCHAR(45) DEFAULT NULL, parents_adresse VARCHAR(255) DEFAULT NULL, parents_telephone VARCHAR(13) DEFAULT NULL, parents_cp INTEGER DEFAULT NULL, parents_ville VARCHAR(255) DEFAULT NULL, parents_status BOOLEAN NOT NULL, parents_date_creation DATETIME NOT NULL, parents_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE Heritage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parents_pseudo VARCHAR(45) NOT NULL, parents_mail VARCHAR(255) NOT NULL, parents_mdp VARCHAR(255) NOT NULL, parents_token VARCHAR(255) NOT NULL, parents_role CLOB NOT NULL --(DC2Type:array)
        , parents_prenom VARCHAR(45) DEFAULT NULL, parents_nom VARCHAR(45) DEFAULT NULL, parents_adresse VARCHAR(255) DEFAULT NULL, parents_telephone VARCHAR(13) DEFAULT NULL, parents_cp INTEGER DEFAULT NULL, parents_ville VARCHAR(255) DEFAULT NULL, parents_status BOOLEAN NOT NULL, parents_date_creation DATETIME NOT NULL, parents_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE TABLE medical (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, medical_enfants_id INTEGER DEFAULT NULL, medical_regime CLOB DEFAULT NULL, medical_traitement CLOB DEFAULT NULL, medical_allergie CLOB DEFAULT NULL, medical_handicap CLOB DEFAULT NULL, medical_status BOOLEAN NOT NULL, medical_date_creation DATETIME NOT NULL, medical_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77DB075A8EC701A0 ON medical (medical_enfants_id)');
        $this->addSql('CREATE TABLE reservations (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, reservations_parents_id INTEGER NOT NULL, reservations_entreprises_id INTEGER NOT NULL, reservations_status_reservation CLOB NOT NULL --(DC2Type:array)
        , reservations_status BOOLEAN NOT NULL, reservations_date_creation DATETIME NOT NULL, reservations_date_modif DATETIME DEFAULT NULL, reservations_debut DATE NOT NULL, reservations_fin DATE NOT NULL)');
        $this->addSql('CREATE INDEX IDX_4DA23951A0D8E ON reservations (reservations_parents_id)');
        $this->addSql('CREATE INDEX IDX_4DA239947E519F ON reservations (reservations_entreprises_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE bracelet');
        $this->addSql('DROP TABLE disponibilite');
        $this->addSql('DROP TABLE disponibilite_reservations');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('DROP TABLE entreprises');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE Heritage');
        $this->addSql('DROP TABLE medical');
        $this->addSql('DROP TABLE reservations');
    }
}
