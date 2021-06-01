<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525183839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location ADD user_location_id INT NOT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CBAF56E81B FOREIGN KEY (user_location_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CBAF56E81B ON location (user_location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CBAF56E81B');
        $this->addSql('DROP INDEX IDX_5E9E89CBAF56E81B ON location');
        $this->addSql('ALTER TABLE location DROP user_location_id');
    }
}
