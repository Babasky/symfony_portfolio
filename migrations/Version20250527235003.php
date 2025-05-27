<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250527235003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, cv VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', title_en VARCHAR(255) DEFAULT NULL, title_fr VARCHAR(255) DEFAULT NULL, description_en VARCHAR(255) DEFAULT NULL, description_fr VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE accueil (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, sub_title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, title_en VARCHAR(255) DEFAULT NULL, title_fr VARCHAR(255) DEFAULT NULL, sub_title_en VARCHAR(255) DEFAULT NULL, sub_title_fr VARCHAR(255) DEFAULT NULL, description_en VARCHAR(255) DEFAULT NULL, description_fr VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, fullname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, title_en VARCHAR(255) DEFAULT NULL, title_fr VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE information_contact (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE outil (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, sub_title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, title_en VARCHAR(255) DEFAULT NULL, title_fr VARCHAR(255) DEFAULT NULL, sub_title_en VARCHAR(255) DEFAULT NULL, sub_title_fr VARCHAR(255) DEFAULT NULL, description_en VARCHAR(255) DEFAULT NULL, description_fr VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, description_en VARCHAR(255) DEFAULT NULL, description_fr VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE project_outil (project_id INT NOT NULL, outil_id INT NOT NULL, INDEX IDX_313773A0166D1F9C (project_id), INDEX IDX_313773A03ED89C80 (outil_id), PRIMARY KEY(project_id, outil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, name_en VARCHAR(255) DEFAULT NULL, name_fr VARCHAR(255) DEFAULT NULL, description_en VARCHAR(255) DEFAULT NULL, description_fr VARCHAR(255) DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE skill_tech (skill_id INT NOT NULL, tech_id INT NOT NULL, INDEX IDX_C1FDACA05585C142 (skill_id), INDEX IDX_C1FDACA064727BFC (tech_id), PRIMARY KEY(skill_id, tech_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE social_network (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE tech (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, pourcentage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT '(DC2Type:json)', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE project_outil ADD CONSTRAINT FK_313773A0166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE project_outil ADD CONSTRAINT FK_313773A03ED89C80 FOREIGN KEY (outil_id) REFERENCES outil (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech ADD CONSTRAINT FK_C1FDACA05585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech ADD CONSTRAINT FK_C1FDACA064727BFC FOREIGN KEY (tech_id) REFERENCES tech (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE project_outil DROP FOREIGN KEY FK_313773A0166D1F9C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE project_outil DROP FOREIGN KEY FK_313773A03ED89C80
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech DROP FOREIGN KEY FK_C1FDACA05585C142
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech DROP FOREIGN KEY FK_C1FDACA064727BFC
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE about
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE accueil
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE contact
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE experience
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE information_contact
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE outil
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE parcours
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE project
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE project_outil
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE skill
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE skill_tech
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE social_network
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE tech
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
