<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230725230657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant CHANGE nom nom VARCHAR(40) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE identifiant identifiant BIGINT NOT NULL, CHANGE classeact classeact VARCHAR(255) NOT NULL, CHANGE classd classd VARCHAR(255) NOT NULL, CHANGE departement departement VARCHAR(255) NOT NULL, CHANGE notea notea DOUBLE PRECISION NOT NULL, CHANGE noteb noteb DOUBLE PRECISION NOT NULL, CHANGE notec notec DOUBLE PRECISION NOT NULL, CHANGE score score DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant CHANGE nom nom VARCHAR(40) DEFAULT \'hazem\', CHANGE prenom prenom VARCHAR(255) DEFAULT \'hazem\', CHANGE identifiant identifiant BIGINT DEFAULT 4 NOT NULL, CHANGE classeact classeact VARCHAR(255) DEFAULT \'ha\' NOT NULL, CHANGE classd classd VARCHAR(255) DEFAULT \'ha\' NOT NULL, CHANGE departement departement VARCHAR(255) DEFAULT \'ha\' NOT NULL, CHANGE notea notea DOUBLE PRECISION DEFAULT \'2\' NOT NULL, CHANGE noteb noteb DOUBLE PRECISION DEFAULT \'2\' NOT NULL, CHANGE notec notec DOUBLE PRECISION DEFAULT \'2\' NOT NULL, CHANGE score score DOUBLE PRECISION DEFAULT NULL');
    }
}
