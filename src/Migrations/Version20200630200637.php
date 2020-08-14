<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630200637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patologia ADD una_historia_clinica_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patologia ADD CONSTRAINT FK_17FB1F75C1462AAE FOREIGN KEY (una_historia_clinica_id) REFERENCES historia_clinica (id)');
        $this->addSql('CREATE INDEX IDX_17FB1F75C1462AAE ON patologia (una_historia_clinica_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE patologia DROP FOREIGN KEY FK_17FB1F75C1462AAE');
        $this->addSql('DROP INDEX IDX_17FB1F75C1462AAE ON patologia');
        $this->addSql('ALTER TABLE patologia DROP una_historia_clinica_id');
    }
}
