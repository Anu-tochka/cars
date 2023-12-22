<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222161504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, car_id_id INT DEFAULT NULL, program_id_id INT DEFAULT NULL, initial_payment INT DEFAULT NULL, term INT NOT NULL, INDEX IDX_E52FFDEEA0EF1B80 (car_id_id), INDEX IDX_E52FFDEEE12DEDA1 (program_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA0EF1B80 FOREIGN KEY (car_id_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEE12DEDA1 FOREIGN KEY (program_id_id) REFERENCES programs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA0EF1B80');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEE12DEDA1');
        $this->addSql('DROP TABLE orders');
    }
}
