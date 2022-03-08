<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308151417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, contenu_commentaire LONGTEXT NOT NULL, date_creation DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commenter (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, ressource_id INT NOT NULL, commentaire_id INT NOT NULL, INDEX IDX_AB751D0AFB88E14F (utilisateur_id), INDEX IDX_AB751D0AFC6CD52A (ressource_id), UNIQUE INDEX UNIQ_AB751D0ABA9CD190 (commentaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, libelle_groupe VARCHAR(50) NOT NULL, type_groupe LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, type_ressource_id INT NOT NULL, categorie_id INT NOT NULL, groupe_id INT NOT NULL, libelle_ressource VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME DEFAULT NULL, citoyen_modification INT DEFAULT NULL, validation_administrateur TINYINT(1) NOT NULL, attribut_media JSON DEFAULT NULL, INDEX IDX_939F45447B2F6F2F (type_ressource_id), INDEX IDX_939F4544BCF5E72D (categorie_id), INDEX IDX_939F45447A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Asso_Ressource_TypeRelation (ressource_id INT NOT NULL, relation_id INT NOT NULL, INDEX IDX_FACCB05FFC6CD52A (ressource_id), INDEX IDX_FACCB05F3256915B (relation_id), PRIMARY KEY(ressource_id, relation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, ressource_id INT NOT NULL, favoris TINYINT(1) DEFAULT NULL, lu TINYINT(1) DEFAULT NULL, liste_de_lecture TINYINT(1) DEFAULT NULL, INDEX IDX_2EBCCA8FFB88E14F (utilisateur_id), INDEX IDX_2EBCCA8FFC6CD52A (ressource_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_relation (id INT AUTO_INCREMENT NOT NULL, libelle_type_relation VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_ressource (id INT AUTO_INCREMENT NOT NULL, libelle_type_ressource VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, statut_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), INDEX IDX_1D1C63B3F6203804 (statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Asso_utilisateur_groupe (utilisateur_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_21D5C1B4FB88E14F (utilisateur_id), INDEX IDX_21D5C1B47A45358C (groupe_id), PRIMARY KEY(utilisateur_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Asso_utilisateur_ressource (utilisateur_id INT NOT NULL, ressources_id INT NOT NULL, INDEX IDX_69942341FB88E14F (utilisateur_id), INDEX IDX_699423413C361826 (ressources_id), PRIMARY KEY(utilisateur_id, ressources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commenter ADD CONSTRAINT FK_AB751D0AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commenter ADD CONSTRAINT FK_AB751D0AFC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id)');
        $this->addSql('ALTER TABLE commenter ADD CONSTRAINT FK_AB751D0ABA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F45447B2F6F2F FOREIGN KEY (type_ressource_id) REFERENCES type_ressource (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F45447A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE Asso_Ressource_TypeRelation ADD CONSTRAINT FK_FACCB05FFC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id)');
        $this->addSql('ALTER TABLE Asso_Ressource_TypeRelation ADD CONSTRAINT FK_FACCB05F3256915B FOREIGN KEY (relation_id) REFERENCES type_relation (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8FFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8FFC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE Asso_utilisateur_groupe ADD CONSTRAINT FK_21D5C1B4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE Asso_utilisateur_groupe ADD CONSTRAINT FK_21D5C1B47A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE Asso_utilisateur_ressource ADD CONSTRAINT FK_69942341FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE Asso_utilisateur_ressource ADD CONSTRAINT FK_699423413C361826 FOREIGN KEY (ressources_id) REFERENCES ressource (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F4544BCF5E72D');
        $this->addSql('ALTER TABLE commenter DROP FOREIGN KEY FK_AB751D0ABA9CD190');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F45447A45358C');
        $this->addSql('ALTER TABLE Asso_utilisateur_groupe DROP FOREIGN KEY FK_21D5C1B47A45358C');
        $this->addSql('ALTER TABLE commenter DROP FOREIGN KEY FK_AB751D0AFC6CD52A');
        $this->addSql('ALTER TABLE Asso_Ressource_TypeRelation DROP FOREIGN KEY FK_FACCB05FFC6CD52A');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8FFC6CD52A');
        $this->addSql('ALTER TABLE Asso_utilisateur_ressource DROP FOREIGN KEY FK_699423413C361826');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3F6203804');
        $this->addSql('ALTER TABLE Asso_Ressource_TypeRelation DROP FOREIGN KEY FK_FACCB05F3256915B');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F45447B2F6F2F');
        $this->addSql('ALTER TABLE commenter DROP FOREIGN KEY FK_AB751D0AFB88E14F');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8FFB88E14F');
        $this->addSql('ALTER TABLE Asso_utilisateur_groupe DROP FOREIGN KEY FK_21D5C1B4FB88E14F');
        $this->addSql('ALTER TABLE Asso_utilisateur_ressource DROP FOREIGN KEY FK_69942341FB88E14F');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE commenter');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE Asso_Ressource_TypeRelation');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE suivi');
        $this->addSql('DROP TABLE type_relation');
        $this->addSql('DROP TABLE type_ressource');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE Asso_utilisateur_groupe');
        $this->addSql('DROP TABLE Asso_utilisateur_ressource');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
