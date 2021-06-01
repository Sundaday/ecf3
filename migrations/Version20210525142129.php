<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525142129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agency (id INT AUTO_INCREMENT NOT NULL, nom_gerant VARCHAR(255) NOT NULL, ville_agence VARCHAR(255) NOT NULL, adress_agence VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category ADD payer_tarif_id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C17FD84674 FOREIGN KEY (payer_tarif_id) REFERENCES tarif (id)');
        $this->addSql('CREATE INDEX IDX_64C19C17FD84674 ON category (payer_tarif_id)');
        $this->addSql('ALTER TABLE tarif CHANGE tarif_caution tarif_caution VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agency');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C17FD84674');
        $this->addSql('DROP INDEX IDX_64C19C17FD84674 ON category');
        $this->addSql('ALTER TABLE category DROP payer_tarif_id');
        $this->addSql('ALTER TABLE tarif CHANGE tarif_caution tarif_caution INT NOT NULL');
    }
}
