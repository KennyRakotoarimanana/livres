<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508053015 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE administrateur ALTER id_administrateur DROP DEFAULT');
        $this->addSql('ALTER TABLE categorie ALTER id_categorie DROP DEFAULT');
        $this->addSql('ALTER TABLE images ALTER id_image DROP DEFAULT');
        $this->addSql('ALTER TABLE images ALTER id_livre DROP NOT NULL');
        $this->addSql('ALTER TABLE livre ALTER id_livre DROP DEFAULT');
        $this->addSql('ALTER TABLE livre ALTER id_categorie DROP NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE administrateur_id_administrateur_seq');
        $this->addSql('SELECT setval(\'administrateur_id_administrateur_seq\', (SELECT MAX(id_administrateur) FROM administrateur))');
        $this->addSql('ALTER TABLE administrateur ALTER id_administrateur SET DEFAULT nextval(\'administrateur_id_administrateur_seq\')');
        $this->addSql('CREATE SEQUENCE categorie_id_categorie_seq');
        $this->addSql('SELECT setval(\'categorie_id_categorie_seq\', (SELECT MAX(id_categorie) FROM categorie))');
        $this->addSql('ALTER TABLE categorie ALTER id_categorie SET DEFAULT nextval(\'categorie_id_categorie_seq\')');
        $this->addSql('CREATE SEQUENCE livre_id_livre_seq');
        $this->addSql('SELECT setval(\'livre_id_livre_seq\', (SELECT MAX(id_livre) FROM livre))');
        $this->addSql('ALTER TABLE livre ALTER id_livre SET DEFAULT nextval(\'livre_id_livre_seq\')');
        $this->addSql('ALTER TABLE livre ALTER id_categorie SET NOT NULL');
        $this->addSql('CREATE SEQUENCE images_id_image_seq');
        $this->addSql('SELECT setval(\'images_id_image_seq\', (SELECT MAX(id_image) FROM images))');
        $this->addSql('ALTER TABLE images ALTER id_image SET DEFAULT nextval(\'images_id_image_seq\')');
        $this->addSql('ALTER TABLE images ALTER id_livre SET NOT NULL');
    }
}
