<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805142652 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ficha ADD un_estado_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficha ADD CONSTRAINT FK_4B7E0861F4D200D5 FOREIGN KEY (un_estado_id) REFERENCES estado_ficha (id)');
        $this->addSql('CREATE INDEX IDX_4B7E0861F4D200D5 ON ficha (un_estado_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ficha DROP FOREIGN KEY FK_4B7E0861F4D200D5');
        $this->addSql('DROP INDEX IDX_4B7E0861F4D200D5 ON ficha');
        $this->addSql('ALTER TABLE ficha DROP un_estado_id');
    }
}
