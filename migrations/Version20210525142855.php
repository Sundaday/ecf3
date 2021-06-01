<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525142855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location CHANGE fuel_end_location fuel_start_location INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD louer_vehicule_id INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D10962973 FOREIGN KEY (louer_vehicule_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D10962973 ON vehicule (louer_vehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location CHANGE fuel_start_location fuel_end_location INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D10962973');
        $this->addSql('DROP INDEX IDX_292FFF1D10962973 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP louer_vehicule_id');
    }
}
