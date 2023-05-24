<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517085426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jouer (oeuvre_id INT NOT NULL, comedien_id INT NOT NULL, role VARCHAR(255) NOT NULL, vf TINYINT(1) NOT NULL, vo TINYINT(1) NOT NULL, INDEX IDX_825E5AED88194DE8 (oeuvre_id), INDEX IDX_825E5AEDF453844F (comedien_id), PRIMARY KEY(oeuvre_id, comedien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre_comedien (oeuvre_id INT NOT NULL, comedien_id INT NOT NULL, INDEX IDX_1E3C195488194DE8 (oeuvre_id), INDEX IDX_1E3C1954F453844F (comedien_id), PRIMARY KEY(oeuvre_id, comedien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AED88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id)');
        $this->addSql('ALTER TABLE jouer ADD CONSTRAINT FK_825E5AEDF453844F FOREIGN KEY (comedien_id) REFERENCES comedien (id)');
        $this->addSql('ALTER TABLE oeuvre_comedien ADD CONSTRAINT FK_1E3C195488194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_comedien ADD CONSTRAINT FK_1E3C1954F453844F FOREIGN KEY (comedien_id) REFERENCES comedien (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE role');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AED88194DE8');
        $this->addSql('ALTER TABLE jouer DROP FOREIGN KEY FK_825E5AEDF453844F');
        $this->addSql('ALTER TABLE oeuvre_comedien DROP FOREIGN KEY FK_1E3C195488194DE8');
        $this->addSql('ALTER TABLE oeuvre_comedien DROP FOREIGN KEY FK_1E3C1954F453844F');
        $this->addSql('DROP TABLE jouer');
        $this->addSql('DROP TABLE oeuvre_comedien');
    }
}
