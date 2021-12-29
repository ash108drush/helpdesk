<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229071545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, worker_id INT NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', message VARCHAR(255) NOT NULL, INDEX IDX_5F9E962A6B20BA36 (worker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, staus_id INT NOT NULL, worker_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, opendate DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', closedate DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_54469DF4F5B7AF75 (address_id), INDEX IDX_54469DF44DCA1D32 (staus_id), INDEX IDX_54469DF46B20BA36 (worker_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticketstatus (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6B20BA36 FOREIGN KEY (worker_id) REFERENCES workers (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF44DCA1D32 FOREIGN KEY (staus_id) REFERENCES ticketstatus (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF46B20BA36 FOREIGN KEY (worker_id) REFERENCES workers (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4F5B7AF75');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF44DCA1D32');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A6B20BA36');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF46B20BA36');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP TABLE ticketstatus');
        $this->addSql('DROP TABLE workers');
    }
}
