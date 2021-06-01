<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525142247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule ADD choisir_agence_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DFA474E6F FOREIGN KEY (choisir_agence_id) REFERENCES agency (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DFA474E6F ON vehicule (choisir_agence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DFA474E6F');
        $this->addSql('DROP INDEX IDX_292FFF1DFA474E6F ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP choisir_agence_id');
    }
}
