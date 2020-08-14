<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629213014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente ADD una_ficha_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B256342016A FOREIGN KEY (una_ficha_id) REFERENCES ficha (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F41C9B256342016A ON cliente (una_ficha_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente DROP FOREIGN KEY FK_F41C9B256342016A');
        $this->addSql('DROP INDEX UNIQ_F41C9B256342016A ON cliente');
        $this->addSql('ALTER TABLE cliente DROP una_ficha_id');
    }
}
