<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524205233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE skill_tech (skill_id INT NOT NULL, tech_id INT NOT NULL, INDEX IDX_C1FDACA05585C142 (skill_id), INDEX IDX_C1FDACA064727BFC (tech_id), PRIMARY KEY(skill_id, tech_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech ADD CONSTRAINT FK_C1FDACA05585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech ADD CONSTRAINT FK_C1FDACA064727BFC FOREIGN KEY (tech_id) REFERENCES tech (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tech DROP FOREIGN KEY FK_86BC30125585C142
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_86BC30125585C142 ON tech
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tech DROP skill_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech DROP FOREIGN KEY FK_C1FDACA05585C142
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE skill_tech DROP FOREIGN KEY FK_C1FDACA064727BFC
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE skill_tech
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tech ADD skill_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tech ADD CONSTRAINT FK_86BC30125585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_86BC30125585C142 ON tech (skill_id)
        SQL);
    }
}
