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
        $this->addSql('ALTER TABLE hour ADD nooOpening TIME NOT NULL, ADD nooClosing TIME NOT NULL, ADD eveningOpening TIME NOT NULL, ADD eveningClosing TIME NOT NULL, DROP noonOpening, DROP noonClosing, DROP eveningOpening, DROP eveningClosing');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hour ADD noonOpening TIME NOT NULL, ADD noonClosing TIME NOT NULL, ADD eveningOpening TIME NOT NULL, ADD eveningClosing TIME NOT NULL, DROP noonOpening, DROP noonClosing, DROP eveningOpening, DROP eveningClosing');
    }
}
