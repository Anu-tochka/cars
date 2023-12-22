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
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, brand_id_id INT DEFAULT NULL, model_id_id INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_95C71D1424BD5740 (brand_id_id), INDEX IDX_95C71D144107BEA0 (model_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE models (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, car_id_id INT DEFAULT NULL, program_id_id INT DEFAULT NULL, initial_payment INT DEFAULT NULL, term INT NOT NULL, INDEX IDX_E52FFDEEA0EF1B80 (car_id_id), INDEX IDX_E52FFDEEE12DEDA1 (program_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D1424BD5740 FOREIGN KEY (brand_id_id) REFERENCES brands (id)');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D144107BEA0 FOREIGN KEY (model_id_id) REFERENCES models (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA0EF1B80 FOREIGN KEY (car_id_id) REFERENCES cars (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEE12DEDA1 FOREIGN KEY (program_id_id) REFERENCES programs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D1424BD5740');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D144107BEA0');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA0EF1B80');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEE12DEDA1');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE models');
        $this->addSql('DROP TABLE orders');
    }
}
