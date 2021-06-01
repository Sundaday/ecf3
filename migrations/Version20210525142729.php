<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525142729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, date_start_location DATETIME NOT NULL, date_end_location DATETIME NOT NULL, type_vehicule VARCHAR(255) NOT NULL, type_category VARCHAR(255) NOT NULL, type_assurance VARCHAR(255) NOT NULL, km_start_location INT NOT NULL, km_end_location INT NOT NULL, fuel_end_location INT NOT NULL, caution_location INT NOT NULL, caution_retenu_location INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE location');
    }
}
