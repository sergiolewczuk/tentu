<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630014439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE informacion_consulta ADD un_motivo_consulta_id INT DEFAULT NULL, DROP motivo');
        $this->addSql('ALTER TABLE informacion_consulta ADD CONSTRAINT FK_E89F0D2EAC14A70D FOREIGN KEY (un_motivo_consulta_id) REFERENCES motivo_consulta (id)');
        $this->addSql('CREATE INDEX IDX_E89F0D2EAC14A70D ON informacion_consulta (un_motivo_consulta_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE informacion_consulta DROP FOREIGN KEY FK_E89F0D2EAC14A70D');
        $this->addSql('DROP INDEX IDX_E89F0D2EAC14A70D ON informacion_consulta');
        $this->addSql('ALTER TABLE informacion_consulta ADD motivo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP un_motivo_consulta_id');
    }
}
