<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524170940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE project_outil (project_id INT NOT NULL, outil_id INT NOT NULL, INDEX IDX_313773A0166D1F9C (project_id), INDEX IDX_313773A03ED89C80 (outil_id), PRIMARY KEY(project_id, outil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT '(DC2Type:json)', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE project_outil ADD CONSTRAINT FK_313773A0166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE project_outil ADD CONSTRAINT FK_313773A03ED89C80 FOREIGN KEY (outil_id) REFERENCES outil (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE outil DROP FOREIGN KEY FK_22627A3E166D1F9C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_22627A3E166D1F9C ON outil
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE outil DROP project_id
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
            DROP TABLE project_outil
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE outil ADD project_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE outil ADD CONSTRAINT FK_22627A3E166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_22627A3E166D1F9C ON outil (project_id)
        SQL);
    }
}
