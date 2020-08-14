<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721140316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente ADD un_genero_id INT DEFAULT NULL, ADD fecha_nacimiento DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE cliente ADD CONSTRAINT FK_F41C9B25D76FF34B FOREIGN KEY (un_genero_id) REFERENCES genero (id)');
        $this->addSql('CREATE INDEX IDX_F41C9B25D76FF34B ON cliente (un_genero_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cliente DROP FOREIGN KEY FK_F41C9B25D76FF34B');
        $this->addSql('DROP INDEX IDX_F41C9B25D76FF34B ON cliente');
        $this->addSql('ALTER TABLE cliente DROP un_genero_id, DROP fecha_nacimiento');
    }
}
