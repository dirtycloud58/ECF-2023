<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215181113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_allergy (reservation_id INT NOT NULL, allergy_id INT NOT NULL, INDEX IDX_AC24F930B83297E7 (reservation_id), INDEX IDX_AC24F930DBFD579D (allergy_id), PRIMARY KEY(reservation_id, allergy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_allergy ADD CONSTRAINT FK_AC24F930B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_allergy ADD CONSTRAINT FK_AC24F930DBFD579D FOREIGN KEY (allergy_id) REFERENCES allergy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE allergy_reservation DROP FOREIGN KEY FK_25BA08E3B83297E7');
        $this->addSql('ALTER TABLE allergy_reservation DROP FOREIGN KEY FK_25BA08E3DBFD579D');
        $this->addSql('DROP TABLE allergy_reservation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergy_reservation (allergy_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_25BA08E3B83297E7 (reservation_id), INDEX IDX_25BA08E3DBFD579D (allergy_id), PRIMARY KEY(allergy_id, reservation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE allergy_reservation ADD CONSTRAINT FK_25BA08E3B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE allergy_reservation ADD CONSTRAINT FK_25BA08E3DBFD579D FOREIGN KEY (allergy_id) REFERENCES allergy (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_allergy DROP FOREIGN KEY FK_AC24F930B83297E7');
        $this->addSql('ALTER TABLE reservation_allergy DROP FOREIGN KEY FK_AC24F930DBFD579D');
        $this->addSql('DROP TABLE reservation_allergy');
    }
}
