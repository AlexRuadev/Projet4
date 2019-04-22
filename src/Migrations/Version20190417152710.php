<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190417152710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_8F91ABF0E92F697A');
        $this->addSql('DROP INDEX IDX_8F91ABF05BC311EA');
        $this->addSql('CREATE TEMPORARY TABLE __temp__avis AS SELECT id, avis_parents_id, avis_entreprises_id, avis_note, avis_commentaires, avis_signalement, avis_status, avis_date_creation, avis_date_modif FROM avis');
        $this->addSql('DROP TABLE avis');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, avis_parents_id INTEGER NOT NULL, avis_entreprises_id INTEGER NOT NULL, avis_note INTEGER DEFAULT NULL, avis_commentaires VARCHAR(255) DEFAULT NULL COLLATE BINARY, avis_signalement INTEGER DEFAULT NULL, avis_status BOOLEAN NOT NULL, avis_date_creation DATETIME NOT NULL, avis_date_modif DATETIME DEFAULT NULL, CONSTRAINT FK_8F91ABF05BC311EA FOREIGN KEY (avis_parents_id) REFERENCES parents (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8F91ABF0E92F697A FOREIGN KEY (avis_entreprises_id) REFERENCES entreprises (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO avis (id, avis_parents_id, avis_entreprises_id, avis_note, avis_commentaires, avis_signalement, avis_status, avis_date_creation, avis_date_modif) SELECT id, avis_parents_id, avis_entreprises_id, avis_note, avis_commentaires, avis_signalement, avis_status, avis_date_creation, avis_date_modif FROM __temp__avis');
        $this->addSql('DROP TABLE __temp__avis');
        $this->addSql('CREATE INDEX IDX_8F91ABF0E92F697A ON avis (avis_entreprises_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF05BC311EA ON avis (avis_parents_id)');
        $this->addSql('DROP INDEX IDX_93F6777DAFB922E4');
        $this->addSql('DROP INDEX UNIQ_93F6777DA30D5003');
        $this->addSql('CREATE TEMPORARY TABLE __temp__bracelet AS SELECT id, bracelet_enfants_id, bracelet_entreprises_id, bracelet_status, bracelet_date_creation, bracelet_date_modif FROM bracelet');
        $this->addSql('DROP TABLE bracelet');
        $this->addSql('CREATE TABLE bracelet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, bracelet_enfants_id INTEGER NOT NULL, bracelet_entreprises_id INTEGER NOT NULL, bracelet_status BOOLEAN NOT NULL, bracelet_date_creation DATETIME NOT NULL, bracelet_date_modif DATETIME DEFAULT NULL, CONSTRAINT FK_93F6777DA30D5003 FOREIGN KEY (bracelet_enfants_id) REFERENCES enfants (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_93F6777DAFB922E4 FOREIGN KEY (bracelet_entreprises_id) REFERENCES entreprises (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO bracelet (id, bracelet_enfants_id, bracelet_entreprises_id, bracelet_status, bracelet_date_creation, bracelet_date_modif) SELECT id, bracelet_enfants_id, bracelet_entreprises_id, bracelet_status, bracelet_date_creation, bracelet_date_modif FROM __temp__bracelet');
        $this->addSql('DROP TABLE __temp__bracelet');
        $this->addSql('CREATE INDEX IDX_93F6777DAFB922E4 ON bracelet (bracelet_entreprises_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93F6777DA30D5003 ON bracelet (bracelet_enfants_id)');
        $this->addSql('DROP INDEX IDX_9FC89007D9A7F869');
        $this->addSql('DROP INDEX IDX_9FC890072B9D6493');
        $this->addSql('CREATE TEMPORARY TABLE __temp__disponibilite_reservations AS SELECT disponibilite_id, reservations_id FROM disponibilite_reservations');
        $this->addSql('DROP TABLE disponibilite_reservations');
        $this->addSql('CREATE TABLE disponibilite_reservations (disponibilite_id INTEGER NOT NULL, reservations_id INTEGER NOT NULL, PRIMARY KEY(disponibilite_id, reservations_id), CONSTRAINT FK_9FC890072B9D6493 FOREIGN KEY (disponibilite_id) REFERENCES disponibilite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9FC89007D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO disponibilite_reservations (disponibilite_id, reservations_id) SELECT disponibilite_id, reservations_id FROM __temp__disponibilite_reservations');
        $this->addSql('DROP TABLE __temp__disponibilite_reservations');
        $this->addSql('CREATE INDEX IDX_9FC89007D9A7F869 ON disponibilite_reservations (reservations_id)');
        $this->addSql('CREATE INDEX IDX_9FC890072B9D6493 ON disponibilite_reservations (disponibilite_id)');
        $this->addSql('DROP INDEX IDX_23E2BAC316EBDBF2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__enfants AS SELECT id, enfants_parents_id, enfants_prenom, enfants_nom, enfants_date_de_naissance, enfants_information, enfants_status, enfants_date_creation, enfants_date_modif FROM enfants');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('CREATE TABLE enfants (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfants_parents_id INTEGER DEFAULT NULL, enfants_prenom VARCHAR(45) NOT NULL COLLATE BINARY, enfants_nom VARCHAR(45) NOT NULL COLLATE BINARY, enfants_date_de_naissance DATE NOT NULL, enfants_information CLOB DEFAULT NULL COLLATE BINARY, enfants_status BOOLEAN NOT NULL, enfants_date_creation DATETIME NOT NULL, enfants_date_modif DATETIME DEFAULT NULL, CONSTRAINT FK_23E2BAC316EBDBF2 FOREIGN KEY (enfants_parents_id) REFERENCES parents (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO enfants (id, enfants_parents_id, enfants_prenom, enfants_nom, enfants_date_de_naissance, enfants_information, enfants_status, enfants_date_creation, enfants_date_modif) SELECT id, enfants_parents_id, enfants_prenom, enfants_nom, enfants_date_de_naissance, enfants_information, enfants_status, enfants_date_creation, enfants_date_modif FROM __temp__enfants');
        $this->addSql('DROP TABLE __temp__enfants');
        $this->addSql('CREATE INDEX IDX_23E2BAC316EBDBF2 ON enfants (enfants_parents_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprises AS SELECT id, entreprises_pseudo, entreprises_mail, entreprises_mdp, entreprises_token, entreprises_role, entreprises_nom, entreprises_effectifs, entreprises_adresse, entreprises_cp, entreprises_ville, entreprises_telephone, entreprises_siret, entreprises_description, entreprises_horaires, entreprises_capacite, entreprises_note, entreprises_tarif, entreprises_espace_exterieur, entreprises_status, entreprises_date_creation, entreprises_date_modif FROM entreprises');
        $this->addSql('DROP TABLE entreprises');
        $this->addSql('CREATE TABLE entreprises (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entreprises_pseudo VARCHAR(45) NOT NULL COLLATE BINARY, entreprises_mail VARCHAR(255) NOT NULL COLLATE BINARY, entreprises_mdp VARCHAR(255) NOT NULL COLLATE BINARY, entreprises_token VARCHAR(255) NOT NULL COLLATE BINARY, entreprises_role CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , entreprises_nom VARCHAR(45) DEFAULT NULL COLLATE BINARY, entreprises_effectifs INTEGER DEFAULT NULL, entreprises_adresse VARCHAR(255) DEFAULT NULL COLLATE BINARY, entreprises_cp INTEGER DEFAULT NULL, entreprises_ville VARCHAR(45) DEFAULT NULL COLLATE BINARY, entreprises_telephone VARCHAR(13) DEFAULT NULL COLLATE BINARY, entreprises_siret INTEGER DEFAULT NULL, entreprises_description CLOB DEFAULT NULL COLLATE BINARY, entreprises_horaires CLOB DEFAULT NULL COLLATE BINARY, entreprises_capacite INTEGER DEFAULT NULL, entreprises_note DOUBLE PRECISION DEFAULT NULL, entreprises_tarif CLOB DEFAULT NULL COLLATE BINARY, entreprises_espace_exterieur BOOLEAN DEFAULT NULL, entreprises_date_creation DATETIME NOT NULL, entreprises_status BOOLEAN DEFAULT NULL, entreprises_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO entreprises (id, entreprises_pseudo, entreprises_mail, entreprises_mdp, entreprises_token, entreprises_role, entreprises_nom, entreprises_effectifs, entreprises_adresse, entreprises_cp, entreprises_ville, entreprises_telephone, entreprises_siret, entreprises_description, entreprises_horaires, entreprises_capacite, entreprises_note, entreprises_tarif, entreprises_espace_exterieur, entreprises_status, entreprises_date_creation, entreprises_date_modif) SELECT id, entreprises_pseudo, entreprises_mail, entreprises_mdp, entreprises_token, entreprises_role, entreprises_nom, entreprises_effectifs, entreprises_adresse, entreprises_cp, entreprises_ville, entreprises_telephone, entreprises_siret, entreprises_description, entreprises_horaires, entreprises_capacite, entreprises_note, entreprises_tarif, entreprises_espace_exterieur, entreprises_status, entreprises_date_creation, entreprises_date_modif FROM __temp__entreprises');
        $this->addSql('DROP TABLE __temp__entreprises');
        $this->addSql('DROP INDEX UNIQ_77DB075A8EC701A0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medical AS SELECT id, medical_enfants_id, medical_regime, medical_traitement, medical_allergie, medical_handicap, medical_status, medical_date_creation, medical_date_modif FROM medical');
        $this->addSql('DROP TABLE medical');
        $this->addSql('CREATE TABLE medical (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, medical_enfants_id INTEGER DEFAULT NULL, medical_regime CLOB DEFAULT NULL COLLATE BINARY, medical_traitement CLOB DEFAULT NULL COLLATE BINARY, medical_allergie CLOB DEFAULT NULL COLLATE BINARY, medical_handicap CLOB DEFAULT NULL COLLATE BINARY, medical_status BOOLEAN NOT NULL, medical_date_creation DATETIME NOT NULL, medical_date_modif DATETIME DEFAULT NULL, CONSTRAINT FK_77DB075A8EC701A0 FOREIGN KEY (medical_enfants_id) REFERENCES enfants (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO medical (id, medical_enfants_id, medical_regime, medical_traitement, medical_allergie, medical_handicap, medical_status, medical_date_creation, medical_date_modif) SELECT id, medical_enfants_id, medical_regime, medical_traitement, medical_allergie, medical_handicap, medical_status, medical_date_creation, medical_date_modif FROM __temp__medical');
        $this->addSql('DROP TABLE __temp__medical');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77DB075A8EC701A0 ON medical (medical_enfants_id)');
        $this->addSql('DROP INDEX IDX_4DA239947E519F');
        $this->addSql('DROP INDEX IDX_4DA23951A0D8E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__reservations AS SELECT id, reservations_parents_id, reservations_entreprises_id, reservations_status_reservation, reservations_status, reservations_date_creation, reservations_date_modif, reservations_debut, reservations_fin FROM reservations');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('CREATE TABLE reservations (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, reservations_parents_id INTEGER NOT NULL, reservations_entreprises_id INTEGER NOT NULL, reservations_status_reservation CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , reservations_status BOOLEAN NOT NULL, reservations_date_creation DATETIME NOT NULL, reservations_date_modif DATETIME DEFAULT NULL, reservations_debut DATE NOT NULL, reservations_fin DATE NOT NULL, CONSTRAINT FK_4DA23951A0D8E FOREIGN KEY (reservations_parents_id) REFERENCES parents (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4DA239947E519F FOREIGN KEY (reservations_entreprises_id) REFERENCES entreprises (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO reservations (id, reservations_parents_id, reservations_entreprises_id, reservations_status_reservation, reservations_status, reservations_date_creation, reservations_date_modif, reservations_debut, reservations_fin) SELECT id, reservations_parents_id, reservations_entreprises_id, reservations_status_reservation, reservations_status, reservations_date_creation, reservations_date_modif, reservations_debut, reservations_fin FROM __temp__reservations');
        $this->addSql('DROP TABLE __temp__reservations');
        $this->addSql('CREATE INDEX IDX_4DA239947E519F ON reservations (reservations_entreprises_id)');
        $this->addSql('CREATE INDEX IDX_4DA23951A0D8E ON reservations (reservations_parents_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_8F91ABF05BC311EA');
        $this->addSql('DROP INDEX IDX_8F91ABF0E92F697A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__avis AS SELECT id, avis_parents_id, avis_entreprises_id, avis_note, avis_commentaires, avis_signalement, avis_status, avis_date_creation, avis_date_modif FROM avis');
        $this->addSql('DROP TABLE avis');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, avis_parents_id INTEGER NOT NULL, avis_entreprises_id INTEGER NOT NULL, avis_note INTEGER DEFAULT NULL, avis_commentaires VARCHAR(255) DEFAULT NULL, avis_signalement INTEGER DEFAULT NULL, avis_status BOOLEAN NOT NULL, avis_date_creation DATETIME NOT NULL, avis_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO avis (id, avis_parents_id, avis_entreprises_id, avis_note, avis_commentaires, avis_signalement, avis_status, avis_date_creation, avis_date_modif) SELECT id, avis_parents_id, avis_entreprises_id, avis_note, avis_commentaires, avis_signalement, avis_status, avis_date_creation, avis_date_modif FROM __temp__avis');
        $this->addSql('DROP TABLE __temp__avis');
        $this->addSql('CREATE INDEX IDX_8F91ABF05BC311EA ON avis (avis_parents_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0E92F697A ON avis (avis_entreprises_id)');
        $this->addSql('DROP INDEX UNIQ_93F6777DA30D5003');
        $this->addSql('DROP INDEX IDX_93F6777DAFB922E4');
        $this->addSql('CREATE TEMPORARY TABLE __temp__bracelet AS SELECT id, bracelet_enfants_id, bracelet_entreprises_id, bracelet_status, bracelet_date_creation, bracelet_date_modif FROM bracelet');
        $this->addSql('DROP TABLE bracelet');
        $this->addSql('CREATE TABLE bracelet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, bracelet_enfants_id INTEGER NOT NULL, bracelet_entreprises_id INTEGER NOT NULL, bracelet_status BOOLEAN NOT NULL, bracelet_date_creation DATETIME NOT NULL, bracelet_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO bracelet (id, bracelet_enfants_id, bracelet_entreprises_id, bracelet_status, bracelet_date_creation, bracelet_date_modif) SELECT id, bracelet_enfants_id, bracelet_entreprises_id, bracelet_status, bracelet_date_creation, bracelet_date_modif FROM __temp__bracelet');
        $this->addSql('DROP TABLE __temp__bracelet');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93F6777DA30D5003 ON bracelet (bracelet_enfants_id)');
        $this->addSql('CREATE INDEX IDX_93F6777DAFB922E4 ON bracelet (bracelet_entreprises_id)');
        $this->addSql('DROP INDEX IDX_9FC890072B9D6493');
        $this->addSql('DROP INDEX IDX_9FC89007D9A7F869');
        $this->addSql('CREATE TEMPORARY TABLE __temp__disponibilite_reservations AS SELECT disponibilite_id, reservations_id FROM disponibilite_reservations');
        $this->addSql('DROP TABLE disponibilite_reservations');
        $this->addSql('CREATE TABLE disponibilite_reservations (disponibilite_id INTEGER NOT NULL, reservations_id INTEGER NOT NULL, PRIMARY KEY(disponibilite_id, reservations_id))');
        $this->addSql('INSERT INTO disponibilite_reservations (disponibilite_id, reservations_id) SELECT disponibilite_id, reservations_id FROM __temp__disponibilite_reservations');
        $this->addSql('DROP TABLE __temp__disponibilite_reservations');
        $this->addSql('CREATE INDEX IDX_9FC890072B9D6493 ON disponibilite_reservations (disponibilite_id)');
        $this->addSql('CREATE INDEX IDX_9FC89007D9A7F869 ON disponibilite_reservations (reservations_id)');
        $this->addSql('DROP INDEX IDX_23E2BAC316EBDBF2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__enfants AS SELECT id, enfants_parents_id, enfants_prenom, enfants_nom, enfants_date_de_naissance, enfants_information, enfants_status, enfants_date_creation, enfants_date_modif FROM enfants');
        $this->addSql('DROP TABLE enfants');
        $this->addSql('CREATE TABLE enfants (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfants_parents_id INTEGER DEFAULT NULL, enfants_prenom VARCHAR(45) NOT NULL, enfants_nom VARCHAR(45) NOT NULL, enfants_date_de_naissance DATE NOT NULL, enfants_information CLOB DEFAULT NULL, enfants_status BOOLEAN NOT NULL, enfants_date_creation DATETIME NOT NULL, enfants_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO enfants (id, enfants_parents_id, enfants_prenom, enfants_nom, enfants_date_de_naissance, enfants_information, enfants_status, enfants_date_creation, enfants_date_modif) SELECT id, enfants_parents_id, enfants_prenom, enfants_nom, enfants_date_de_naissance, enfants_information, enfants_status, enfants_date_creation, enfants_date_modif FROM __temp__enfants');
        $this->addSql('DROP TABLE __temp__enfants');
        $this->addSql('CREATE INDEX IDX_23E2BAC316EBDBF2 ON enfants (enfants_parents_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__entreprises AS SELECT id, entreprises_pseudo, entreprises_mail, entreprises_mdp, entreprises_token, entreprises_role, entreprises_nom, entreprises_effectifs, entreprises_adresse, entreprises_cp, entreprises_ville, entreprises_telephone, entreprises_siret, entreprises_description, entreprises_horaires, entreprises_capacite, entreprises_note, entreprises_tarif, entreprises_espace_exterieur, entreprises_status, entreprises_date_creation, entreprises_date_modif FROM entreprises');
        $this->addSql('DROP TABLE entreprises');
        $this->addSql('CREATE TABLE entreprises (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, entreprises_pseudo VARCHAR(45) NOT NULL, entreprises_mail VARCHAR(255) NOT NULL, entreprises_mdp VARCHAR(255) NOT NULL, entreprises_token VARCHAR(255) NOT NULL, entreprises_role CLOB NOT NULL --(DC2Type:array)
        , entreprises_nom VARCHAR(45) DEFAULT NULL, entreprises_effectifs INTEGER DEFAULT NULL, entreprises_adresse VARCHAR(255) DEFAULT NULL, entreprises_cp INTEGER DEFAULT NULL, entreprises_ville VARCHAR(45) DEFAULT NULL, entreprises_telephone VARCHAR(13) DEFAULT NULL, entreprises_siret INTEGER DEFAULT NULL, entreprises_description CLOB DEFAULT NULL, entreprises_horaires CLOB DEFAULT NULL, entreprises_capacite INTEGER DEFAULT NULL, entreprises_note DOUBLE PRECISION DEFAULT NULL, entreprises_tarif CLOB DEFAULT NULL, entreprises_espace_exterieur BOOLEAN DEFAULT NULL, entreprises_date_creation DATETIME NOT NULL, entreprises_status BOOLEAN NOT NULL, entreprises_date_modif DATETIME NOT NULL)');
        $this->addSql('INSERT INTO entreprises (id, entreprises_pseudo, entreprises_mail, entreprises_mdp, entreprises_token, entreprises_role, entreprises_nom, entreprises_effectifs, entreprises_adresse, entreprises_cp, entreprises_ville, entreprises_telephone, entreprises_siret, entreprises_description, entreprises_horaires, entreprises_capacite, entreprises_note, entreprises_tarif, entreprises_espace_exterieur, entreprises_status, entreprises_date_creation, entreprises_date_modif) SELECT id, entreprises_pseudo, entreprises_mail, entreprises_mdp, entreprises_token, entreprises_role, entreprises_nom, entreprises_effectifs, entreprises_adresse, entreprises_cp, entreprises_ville, entreprises_telephone, entreprises_siret, entreprises_description, entreprises_horaires, entreprises_capacite, entreprises_note, entreprises_tarif, entreprises_espace_exterieur, entreprises_status, entreprises_date_creation, entreprises_date_modif FROM __temp__entreprises');
        $this->addSql('DROP TABLE __temp__entreprises');
        $this->addSql('DROP INDEX UNIQ_77DB075A8EC701A0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__medical AS SELECT id, medical_enfants_id, medical_regime, medical_traitement, medical_allergie, medical_handicap, medical_status, medical_date_creation, medical_date_modif FROM medical');
        $this->addSql('DROP TABLE medical');
        $this->addSql('CREATE TABLE medical (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, medical_enfants_id INTEGER DEFAULT NULL, medical_regime CLOB DEFAULT NULL, medical_traitement CLOB DEFAULT NULL, medical_allergie CLOB DEFAULT NULL, medical_handicap CLOB DEFAULT NULL, medical_status BOOLEAN NOT NULL, medical_date_creation DATETIME NOT NULL, medical_date_modif DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO medical (id, medical_enfants_id, medical_regime, medical_traitement, medical_allergie, medical_handicap, medical_status, medical_date_creation, medical_date_modif) SELECT id, medical_enfants_id, medical_regime, medical_traitement, medical_allergie, medical_handicap, medical_status, medical_date_creation, medical_date_modif FROM __temp__medical');
        $this->addSql('DROP TABLE __temp__medical');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_77DB075A8EC701A0 ON medical (medical_enfants_id)');
        $this->addSql('DROP INDEX IDX_4DA23951A0D8E');
        $this->addSql('DROP INDEX IDX_4DA239947E519F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__reservations AS SELECT id, reservations_parents_id, reservations_entreprises_id, reservations_status_reservation, reservations_status, reservations_date_creation, reservations_date_modif, reservations_debut, reservations_fin FROM reservations');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('CREATE TABLE reservations (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, reservations_parents_id INTEGER NOT NULL, reservations_entreprises_id INTEGER NOT NULL, reservations_status_reservation CLOB NOT NULL --(DC2Type:array)
        , reservations_status BOOLEAN NOT NULL, reservations_date_creation DATETIME NOT NULL, reservations_date_modif DATETIME DEFAULT NULL, reservations_debut DATE NOT NULL, reservations_fin DATE NOT NULL)');
        $this->addSql('INSERT INTO reservations (id, reservations_parents_id, reservations_entreprises_id, reservations_status_reservation, reservations_status, reservations_date_creation, reservations_date_modif, reservations_debut, reservations_fin) SELECT id, reservations_parents_id, reservations_entreprises_id, reservations_status_reservation, reservations_status, reservations_date_creation, reservations_date_modif, reservations_debut, reservations_fin FROM __temp__reservations');
        $this->addSql('DROP TABLE __temp__reservations');
        $this->addSql('CREATE INDEX IDX_4DA23951A0D8E ON reservations (reservations_parents_id)');
        $this->addSql('CREATE INDEX IDX_4DA239947E519F ON reservations (reservations_entreprises_id)');
    }
}
