<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121123448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hour ADD noon_opening TIME NOT NULL, ADD noon_closing TIME NOT NULL, ADD evening_opening TIME NOT NULL, ADD evening_closing TIME NOT NULL, DROP noon_opening, DROP noon_closing, DROP evening_opening, DROP evening_closing');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hour ADD noon_opening TIME NOT NULL, ADD noon_closing TIME NOT NULL, ADD evening_opening TIME NOT NULL, ADD evening_closing TIME NOT NULL, DROP noon_opening, DROP noon_closing, DROP evening_opening, DROP evening_closing');
    }
}
