<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805135632 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actividad_fisica (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historia_personal ADD una_actividad_fisica_id INT DEFAULT NULL, DROP actividad_fisica');
        $this->addSql('ALTER TABLE historia_personal ADD CONSTRAINT FK_91CF0D46746A44D1 FOREIGN KEY (una_actividad_fisica_id) REFERENCES actividad_fisica (id)');
        $this->addSql('CREATE INDEX IDX_91CF0D46746A44D1 ON historia_personal (una_actividad_fisica_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_personal DROP FOREIGN KEY FK_91CF0D46746A44D1');
        $this->addSql('DROP TABLE actividad_fisica');
        $this->addSql('DROP INDEX IDX_91CF0D46746A44D1 ON historia_personal');
        $this->addSql('ALTER TABLE historia_personal ADD actividad_fisica TINYINT(1) NOT NULL, DROP una_actividad_fisica_id');
    }
}
