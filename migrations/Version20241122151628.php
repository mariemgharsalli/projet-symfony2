<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122151628 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_event ADD evenement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_event ADD CONSTRAINT FK_CED6E777FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('CREATE INDEX IDX_CED6E777FD02F13 ON categorie_event (evenement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_event DROP FOREIGN KEY FK_CED6E777FD02F13');
        $this->addSql('DROP INDEX IDX_CED6E777FD02F13 ON categorie_event');
        $this->addSql('ALTER TABLE categorie_event DROP evenement_id');
    }
}
