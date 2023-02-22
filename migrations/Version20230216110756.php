<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216110756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP INDEX UNIQ_BFDD31681C3AC5D2, ADD INDEX IDX_BFDD31681C3AC5D2 (id_categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP INDEX IDX_BFDD31681C3AC5D2, ADD UNIQUE INDEX UNIQ_BFDD31681C3AC5D2 (id_categories_id)');
    }
}
