<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202100021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_articles DROP FOREIGN KEY FK_2E8FDA06C36D46DB');
        $this->addSql('ALTER TABLE avoir_articles DROP FOREIGN KEY FK_2E8FDA061EBAF6CC');
        $this->addSql('ALTER TABLE avoir_media DROP FOREIGN KEY FK_67D5D51FC36D46DB');
        $this->addSql('ALTER TABLE avoir_media DROP FOREIGN KEY FK_67D5D51FEA9FDD75');
        $this->addSql('DROP TABLE avoir');
        $this->addSql('DROP TABLE avoir_articles');
        $this->addSql('DROP TABLE avoir_media');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avoir (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE avoir_articles (avoir_id INT NOT NULL, articles_id INT NOT NULL, INDEX IDX_2E8FDA061EBAF6CC (articles_id), INDEX IDX_2E8FDA06C36D46DB (avoir_id), PRIMARY KEY(avoir_id, articles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE avoir_media (avoir_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_67D5D51FEA9FDD75 (media_id), INDEX IDX_67D5D51FC36D46DB (avoir_id), PRIMARY KEY(avoir_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE avoir_articles ADD CONSTRAINT FK_2E8FDA06C36D46DB FOREIGN KEY (avoir_id) REFERENCES avoir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avoir_articles ADD CONSTRAINT FK_2E8FDA061EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avoir_media ADD CONSTRAINT FK_67D5D51FC36D46DB FOREIGN KEY (avoir_id) REFERENCES avoir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avoir_media ADD CONSTRAINT FK_67D5D51FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
    }
}
