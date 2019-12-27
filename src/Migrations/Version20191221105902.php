<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191221105902 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE presence DROP FOREIGN KEY FK_6977C7A53984CC5A');
        $this->addSql('DROP TABLE temps');
        $this->addSql('DROP INDEX IDX_6977C7A53984CC5A ON presence');
        $this->addSql('ALTER TABLE presence ADD temps DATE DEFAULT NULL, ADD action VARCHAR(100) DEFAULT NULL, DROP temps_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE temps (id INT AUTO_INCREMENT NOT NULL, date_ouvrable DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE presence ADD temps_id INT DEFAULT NULL, DROP temps, DROP action');
        $this->addSql('ALTER TABLE presence ADD CONSTRAINT FK_6977C7A53984CC5A FOREIGN KEY (temps_id) REFERENCES temps (id)');
        $this->addSql('CREATE INDEX IDX_6977C7A53984CC5A ON presence (temps_id)');
    }
}
