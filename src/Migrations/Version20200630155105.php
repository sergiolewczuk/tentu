<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630155105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_personal ADD una_funcion_intestinal_id INT DEFAULT NULL, ADD un_ciclo_id INT DEFAULT NULL, ADD actividad_fisica TINYINT(1) NOT NULL, ADD que_actividad VARCHAR(255) DEFAULT NULL, ADD cuando_cuantas VARCHAR(255) DEFAULT NULL, ADD actividad_laboral VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE historia_personal ADD CONSTRAINT FK_91CF0D4635142A8E FOREIGN KEY (una_funcion_intestinal_id) REFERENCES funcion_intestinal (id)');
        $this->addSql('ALTER TABLE historia_personal ADD CONSTRAINT FK_91CF0D46EE9A4798 FOREIGN KEY (un_ciclo_id) REFERENCES suenio (id)');
        $this->addSql('CREATE INDEX IDX_91CF0D4635142A8E ON historia_personal (una_funcion_intestinal_id)');
        $this->addSql('CREATE INDEX IDX_91CF0D46EE9A4798 ON historia_personal (un_ciclo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_personal DROP FOREIGN KEY FK_91CF0D4635142A8E');
        $this->addSql('ALTER TABLE historia_personal DROP FOREIGN KEY FK_91CF0D46EE9A4798');
        $this->addSql('DROP INDEX IDX_91CF0D4635142A8E ON historia_personal');
        $this->addSql('DROP INDEX IDX_91CF0D46EE9A4798 ON historia_personal');
        $this->addSql('ALTER TABLE historia_personal DROP una_funcion_intestinal_id, DROP un_ciclo_id, DROP actividad_fisica, DROP que_actividad, DROP cuando_cuantas, DROP actividad_laboral');
    }
}
