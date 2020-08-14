<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629235349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE historia_alimentaria (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historia_clinica (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historia_personal (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ficha ADD una_historia_clinica_id INT DEFAULT NULL, ADD una_historia_alimentaria_id INT DEFAULT NULL, ADD una_historia_personal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficha ADD CONSTRAINT FK_4B7E0861C1462AAE FOREIGN KEY (una_historia_clinica_id) REFERENCES historia_clinica (id)');
        $this->addSql('ALTER TABLE ficha ADD CONSTRAINT FK_4B7E086127899621 FOREIGN KEY (una_historia_alimentaria_id) REFERENCES historia_alimentaria (id)');
        $this->addSql('ALTER TABLE ficha ADD CONSTRAINT FK_4B7E08613C0659B FOREIGN KEY (una_historia_personal_id) REFERENCES historia_personal (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B7E0861C1462AAE ON ficha (una_historia_clinica_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B7E086127899621 ON ficha (una_historia_alimentaria_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B7E08613C0659B ON ficha (una_historia_personal_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ficha DROP FOREIGN KEY FK_4B7E086127899621');
        $this->addSql('ALTER TABLE ficha DROP FOREIGN KEY FK_4B7E0861C1462AAE');
        $this->addSql('ALTER TABLE ficha DROP FOREIGN KEY FK_4B7E08613C0659B');
        $this->addSql('DROP TABLE historia_alimentaria');
        $this->addSql('DROP TABLE historia_clinica');
        $this->addSql('DROP TABLE historia_personal');
        $this->addSql('DROP INDEX UNIQ_4B7E0861C1462AAE ON ficha');
        $this->addSql('DROP INDEX UNIQ_4B7E086127899621 ON ficha');
        $this->addSql('DROP INDEX UNIQ_4B7E08613C0659B ON ficha');
        $this->addSql('ALTER TABLE ficha DROP una_historia_clinica_id, DROP una_historia_alimentaria_id, DROP una_historia_personal_id');
    }
}
