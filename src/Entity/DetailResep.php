<?php

namespace PHPMaker2025\apotik2025baru\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2025\apotik2025baru\AdvancedUserInterface;
use PHPMaker2025\apotik2025baru\AbstractEntity;
use PHPMaker2025\apotik2025baru\AdvancedSecurity;
use PHPMaker2025\apotik2025baru\UserProfile;
use PHPMaker2025\apotik2025baru\UserRepository;
use function PHPMaker2025\apotik2025baru\Config;
use function PHPMaker2025\apotik2025baru\EntityManager;
use function PHPMaker2025\apotik2025baru\RemoveXss;
use function PHPMaker2025\apotik2025baru\HtmlDecode;
use function PHPMaker2025\apotik2025baru\HashPassword;
use function PHPMaker2025\apotik2025baru\Security;

/**
 * Entity class for "detail_resep" table
 */

#[Entity]
#[Table("detail_resep", options: ["dbId" => "DB"])]
class DetailResep extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_detail", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdDetail;

    #[Column(name: "id_kunjungan", type: "integer")]
    private int $IdKunjungan;

    #[Column(name: "id_obat", type: "integer")]
    private int $IdObat;

    #[Column(name: "jumlah", type: "integer")]
    private int $Jumlah;

    #[Column(name: "dosis", type: "string", nullable: true)]
    private ?string $Dosis;

    public function getIdDetail(): int
    {
        return $this->IdDetail;
    }

    public function setIdDetail(int $value): static
    {
        $this->IdDetail = $value;
        return $this;
    }

    public function getIdKunjungan(): int
    {
        return $this->IdKunjungan;
    }

    public function setIdKunjungan(int $value): static
    {
        $this->IdKunjungan = $value;
        return $this;
    }

    public function getIdObat(): int
    {
        return $this->IdObat;
    }

    public function setIdObat(int $value): static
    {
        $this->IdObat = $value;
        return $this;
    }

    public function getJumlah(): int
    {
        return $this->Jumlah;
    }

    public function setJumlah(int $value): static
    {
        $this->Jumlah = $value;
        return $this;
    }

    public function getDosis(): ?string
    {
        return HtmlDecode($this->Dosis);
    }

    public function setDosis(?string $value): static
    {
        $this->Dosis = RemoveXss($value);
        return $this;
    }
}
