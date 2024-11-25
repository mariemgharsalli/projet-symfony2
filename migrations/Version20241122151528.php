<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122151528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_event ADD evenement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_event ADD CONSTRAINT FK_35A28D50FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_35A28D50FD02F13 ON type_event (evenement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_event DROP FOREIGN KEY FK_35A28D50FD02F13');
        $this->addSql('DROP INDEX IDX_35A28D50FD02F13 ON type_event');
        $this->addSql('ALTER TABLE type_event DROP evenement_id');
    }
}
