<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629235450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ficha ADD una_medicion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficha ADD CONSTRAINT FK_4B7E0861965F7098 FOREIGN KEY (una_medicion_id) REFERENCES medicion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B7E0861965F7098 ON ficha (una_medicion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ficha DROP FOREIGN KEY FK_4B7E0861965F7098');
        $this->addSql('DROP INDEX UNIQ_4B7E0861965F7098 ON ficha');
        $this->addSql('ALTER TABLE ficha DROP una_medicion_id');
    }
}
