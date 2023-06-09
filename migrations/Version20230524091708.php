<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524091708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet ADD categorie_id INT DEFAULT NULL, DROP categorie');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_50159CA9BCF5E72D ON projet (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9BCF5E72D');
        $this->addSql('DROP INDEX IDX_50159CA9BCF5E72D ON projet');
        $this->addSql('ALTER TABLE projet ADD categorie VARCHAR(255) NOT NULL, DROP categorie_id');
    }
}
