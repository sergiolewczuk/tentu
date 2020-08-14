<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630183215 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_alimentaria ADD una_hora_desayuno_id INT DEFAULT NULL, ADD una_hora_almuerzo_id INT DEFAULT NULL, ADD una_hora_merienda_id INT DEFAULT NULL, ADD una_hora_cena_id INT DEFAULT NULL, ADD alimento_favorito VARCHAR(255) NOT NULL, ADD alimento_rechazado VARCHAR(255) DEFAULT NULL, ADD alergia_intolerancia VARCHAR(255) DEFAULT NULL, ADD otras_aclaraiones VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE historia_alimentaria ADD CONSTRAINT FK_C60FE496A6FB467F FOREIGN KEY (una_hora_desayuno_id) REFERENCES hora_desayuno (id)');
        $this->addSql('ALTER TABLE historia_alimentaria ADD CONSTRAINT FK_C60FE4969F519085 FOREIGN KEY (una_hora_almuerzo_id) REFERENCES hora_almuerzo (id)');
        $this->addSql('ALTER TABLE historia_alimentaria ADD CONSTRAINT FK_C60FE4967A281C7C FOREIGN KEY (una_hora_merienda_id) REFERENCES hora_merienda (id)');
        $this->addSql('ALTER TABLE historia_alimentaria ADD CONSTRAINT FK_C60FE496DFCE200E FOREIGN KEY (una_hora_cena_id) REFERENCES hora_cena (id)');
        $this->addSql('CREATE INDEX IDX_C60FE496A6FB467F ON historia_alimentaria (una_hora_desayuno_id)');
        $this->addSql('CREATE INDEX IDX_C60FE4969F519085 ON historia_alimentaria (una_hora_almuerzo_id)');
        $this->addSql('CREATE INDEX IDX_C60FE4967A281C7C ON historia_alimentaria (una_hora_merienda_id)');
        $this->addSql('CREATE INDEX IDX_C60FE496DFCE200E ON historia_alimentaria (una_hora_cena_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_alimentaria DROP FOREIGN KEY FK_C60FE496A6FB467F');
        $this->addSql('ALTER TABLE historia_alimentaria DROP FOREIGN KEY FK_C60FE4969F519085');
        $this->addSql('ALTER TABLE historia_alimentaria DROP FOREIGN KEY FK_C60FE4967A281C7C');
        $this->addSql('ALTER TABLE historia_alimentaria DROP FOREIGN KEY FK_C60FE496DFCE200E');
        $this->addSql('DROP INDEX IDX_C60FE496A6FB467F ON historia_alimentaria');
        $this->addSql('DROP INDEX IDX_C60FE4969F519085 ON historia_alimentaria');
        $this->addSql('DROP INDEX IDX_C60FE4967A281C7C ON historia_alimentaria');
        $this->addSql('DROP INDEX IDX_C60FE496DFCE200E ON historia_alimentaria');
        $this->addSql('ALTER TABLE historia_alimentaria DROP una_hora_desayuno_id, DROP una_hora_almuerzo_id, DROP una_hora_merienda_id, DROP una_hora_cena_id, DROP alimento_favorito, DROP alimento_rechazado, DROP alergia_intolerancia, DROP otras_aclaraiones');
    }
}
