<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721192731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_alimentaria ADD un_agua_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historia_alimentaria ADD CONSTRAINT FK_C60FE496F8D506BE FOREIGN KEY (un_agua_id) REFERENCES agua (id)');
        $this->addSql('CREATE INDEX IDX_C60FE496F8D506BE ON historia_alimentaria (un_agua_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE historia_alimentaria DROP FOREIGN KEY FK_C60FE496F8D506BE');
        $this->addSql('DROP INDEX IDX_C60FE496F8D506BE ON historia_alimentaria');
        $this->addSql('ALTER TABLE historia_alimentaria DROP un_agua_id');
    }
}
