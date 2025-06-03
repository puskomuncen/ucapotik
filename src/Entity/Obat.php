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
 * Entity class for "obat" table
 */

#[Entity]
#[Table("obat", options: ["dbId" => "DB"])]
class Obat extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_obat", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdObat;

    #[Column(name: "nama_obat", type: "string")]
    private string $NamaObat;

    #[Column(name: "kategori", type: "string", nullable: true)]
    private ?string $Kategori;

    #[Column(name: "harga", type: "decimal")]
    private string $Harga;

    #[Column(name: "stok", type: "integer")]
    private int $Stok;

    #[Column(name: "expired_date", type: "date", nullable: true)]
    private ?DateTime $ExpiredDate;

    #[Column(name: "satuan", type: "string", nullable: true)]
    private ?string $Satuan;

    public function __construct()
    {
        $this->Satuan = "tablet";
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

    public function getNamaObat(): string
    {
        return HtmlDecode($this->NamaObat);
    }

    public function setNamaObat(string $value): static
    {
        $this->NamaObat = RemoveXss($value);
        return $this;
    }

    public function getKategori(): ?string
    {
        return HtmlDecode($this->Kategori);
    }

    public function setKategori(?string $value): static
    {
        $this->Kategori = RemoveXss($value);
        return $this;
    }

    public function getHarga(): string
    {
        return $this->Harga;
    }

    public function setHarga(string $value): static
    {
        $this->Harga = $value;
        return $this;
    }

    public function getStok(): int
    {
        return $this->Stok;
    }

    public function setStok(int $value): static
    {
        $this->Stok = $value;
        return $this;
    }

    public function getExpiredDate(): ?DateTime
    {
        return $this->ExpiredDate;
    }

    public function setExpiredDate(?DateTime $value): static
    {
        $this->ExpiredDate = $value;
        return $this;
    }

    public function getSatuan(): ?string
    {
        return HtmlDecode($this->Satuan);
    }

    public function setSatuan(?string $value): static
    {
        $this->Satuan = RemoveXss($value);
        return $this;
    }
}
