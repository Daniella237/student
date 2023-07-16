<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407134747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, sexe VARCHAR(8) NOT NULL, tel INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, quota INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere_enseignant (matiere_id INT NOT NULL, enseignant_id INT NOT NULL, INDEX IDX_536FA40FF46CD258 (matiere_id), INDEX IDX_536FA40FE455FCC0 (enseignant_id), PRIMARY KEY(matiere_id, enseignant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_matiere (niveau_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_F000ED3CB3E9C81 (niveau_id), INDEX IDX_F000ED3CF46CD258 (matiere_id), PRIMARY KEY(niveau_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progression (id INT AUTO_INCREMENT NOT NULL, enseignants_id INT NOT NULL, matieres_id INT NOT NULL, seances_id INT NOT NULL, date DATE NOT NULL, duree INT NOT NULL, INDEX IDX_D5B250737CF12A69 (enseignants_id), INDEX IDX_D5B2507382350831 (matieres_id), INDEX IDX_D5B2507310F09302 (seances_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, filieres_id INT NOT NULL, libelle VARCHAR(20) NOT NULL, INDEX IDX_E7D6FCC1A5DB2FE8 (filieres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_niveau (specialite_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_F7CBAACD2195E0F0 (specialite_id), INDEX IDX_F7CBAACDB3E9C81 (niveau_id), PRIMARY KEY(specialite_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_matiere (specialite_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_AF1D45CE2195E0F0 (specialite_id), INDEX IDX_AF1D45CEF46CD258 (matiere_id), PRIMARY KEY(specialite_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiere_enseignant ADD CONSTRAINT FK_536FA40FF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_enseignant ADD CONSTRAINT FK_536FA40FE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveau_matiere ADD CONSTRAINT FK_F000ED3CB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveau_matiere ADD CONSTRAINT FK_F000ED3CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE progression ADD CONSTRAINT FK_D5B250737CF12A69 FOREIGN KEY (enseignants_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE progression ADD CONSTRAINT FK_D5B2507382350831 FOREIGN KEY (matieres_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE progression ADD CONSTRAINT FK_D5B2507310F09302 FOREIGN KEY (seances_id) REFERENCES seance (id)');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC1A5DB2FE8 FOREIGN KEY (filieres_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE specialite_niveau ADD CONSTRAINT FK_F7CBAACD2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_niveau ADD CONSTRAINT FK_F7CBAACDB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_matiere ADD CONSTRAINT FK_AF1D45CE2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_matiere ADD CONSTRAINT FK_AF1D45CEF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere_enseignant DROP FOREIGN KEY FK_536FA40FE455FCC0');
        $this->addSql('ALTER TABLE progression DROP FOREIGN KEY FK_D5B250737CF12A69');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC1A5DB2FE8');
        $this->addSql('ALTER TABLE matiere_enseignant DROP FOREIGN KEY FK_536FA40FF46CD258');
        $this->addSql('ALTER TABLE niveau_matiere DROP FOREIGN KEY FK_F000ED3CF46CD258');
        $this->addSql('ALTER TABLE progression DROP FOREIGN KEY FK_D5B2507382350831');
        $this->addSql('ALTER TABLE specialite_matiere DROP FOREIGN KEY FK_AF1D45CEF46CD258');
        $this->addSql('ALTER TABLE niveau_matiere DROP FOREIGN KEY FK_F000ED3CB3E9C81');
        $this->addSql('ALTER TABLE specialite_niveau DROP FOREIGN KEY FK_F7CBAACDB3E9C81');
        $this->addSql('ALTER TABLE progression DROP FOREIGN KEY FK_D5B2507310F09302');
        $this->addSql('ALTER TABLE specialite_niveau DROP FOREIGN KEY FK_F7CBAACD2195E0F0');
        $this->addSql('ALTER TABLE specialite_matiere DROP FOREIGN KEY FK_AF1D45CE2195E0F0');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE matiere_enseignant');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE niveau_matiere');
        $this->addSql('DROP TABLE progression');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE specialite_niveau');
        $this->addSql('DROP TABLE specialite_matiere');
        $this->addSql('DROP TABLE user');
    }
}
