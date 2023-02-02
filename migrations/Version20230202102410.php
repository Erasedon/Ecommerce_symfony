<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230202102410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles_taille (articles_id INT NOT NULL, taille_id INT NOT NULL, INDEX IDX_CC685F151EBAF6CC (articles_id), INDEX IDX_CC685F15FF25611A (taille_id), PRIMARY KEY(articles_id, taille_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_panier (articles_id INT NOT NULL, panier_id INT NOT NULL, INDEX IDX_9EF4D9DF1EBAF6CC (articles_id), INDEX IDX_9EF4D9DFF77D927C (panier_id), PRIMARY KEY(articles_id, panier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_commande (user_id INT NOT NULL, commande_id INT NOT NULL, INDEX IDX_8E67427DA76ED395 (user_id), INDEX IDX_8E67427D82EA2E54 (commande_id), PRIMARY KEY(user_id, commande_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles_taille ADD CONSTRAINT FK_CC685F151EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_taille ADD CONSTRAINT FK_CC685F15FF25611A FOREIGN KEY (taille_id) REFERENCES taille (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_panier ADD CONSTRAINT FK_9EF4D9DF1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles_panier ADD CONSTRAINT FK_9EF4D9DFF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_commande ADD CONSTRAINT FK_8E67427DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_commande ADD CONSTRAINT FK_8E67427D82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_taille DROP FOREIGN KEY FK_CC685F151EBAF6CC');
        $this->addSql('ALTER TABLE articles_taille DROP FOREIGN KEY FK_CC685F15FF25611A');
        $this->addSql('ALTER TABLE articles_panier DROP FOREIGN KEY FK_9EF4D9DF1EBAF6CC');
        $this->addSql('ALTER TABLE articles_panier DROP FOREIGN KEY FK_9EF4D9DFF77D927C');
        $this->addSql('ALTER TABLE user_commande DROP FOREIGN KEY FK_8E67427DA76ED395');
        $this->addSql('ALTER TABLE user_commande DROP FOREIGN KEY FK_8E67427D82EA2E54');
        $this->addSql('DROP TABLE articles_taille');
        $this->addSql('DROP TABLE articles_panier');
        $this->addSql('DROP TABLE user_commande');
    }
}
